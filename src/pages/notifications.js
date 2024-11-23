import React, { useState, useEffect, useContext, useRef } from "react";
import { View, Text, SafeAreaView, FlatList, Platform } from "react-native";
import * as Notifications from 'expo-notifications';
import Constants from 'expo-constants';
import { Context } from "../pages/initialPages/context/provider";
import { useTheme } from "../pages/initialPages/context/themecontext";
import axios from "axios";
import ApisUrls from "../ApisUrls/apisurls.js";
import styles from "../styles/notifications.js";
import MaterialCommunityIcons from "@expo/vector-icons/MaterialCommunityIcons";

Notifications.setNotificationHandler({
  handleNotification: async () => ({
    shouldShowAlert: true,
    shouldPlaySound: false,
    shouldSetBadge: false,
  }),
});

export default function NotificationsScreen() {
  const { theme } = useTheme();
  const { userId } = useContext(Context);
  const [expoPushToken, setExpoPushToken] = useState('');
  const [notifications, setNotifications] = useState([]);
  const notificationListener = useRef();
  const responseListener = useRef();
  const { apiNgrokNotificacoes } = ApisUrls;

  useEffect(() => {
    const fetchNotifications = async () => {
      try {
        const response = await axios.get(`${apiNgrokNotificacoes}/${userId}`);
        const newNotifications = response.data;

        setNotifications((prevNotifications) => {
          const updatedNotifications = newNotifications.filter((newItem) => 
            !prevNotifications.some((existingItem) => existingItem.idVagaUsuario === newItem.idVagaUsuario)
          );
          return [...updatedNotifications, ...prevNotifications];
        });
      } catch (error) {
        console.log(error);
      }
    };
  }, [userId, apiNgrokNotificacoes]);

  const renderItem = ({ item }) => (
    <View style={{ borderRadius: 5, marginVertical: 10 }}>
      <View style={{ backgroundColor: theme.backgroundColorNavBar, paddingVertical: 5, paddingHorizontal: 10, alignItems: 'center', justifyContent: 'space-between', flexDirection: 'row', borderTopLeftRadius: 10, borderTopRightRadius: 10, borderLeftWidth: 2, borderRightWidth: 2, borderTopWidth: 2 }}>
        <Text style={[styles.DMSansBold, { color: theme.textColor, fontSize: 18 }]}>Notificação</Text>
        <MaterialCommunityIcons name={"bell"} size={25} color={"#20dd77"} />
      </View>
      <View style={{ borderLeftWidth: 2, borderRightWidth: 2, borderBottomWidth: 2, borderBottomLeftRadius: 10, borderBottomRightRadius: 10, padding: 10 }}>
        <Text style={[styles.DMSansRegular, { color: theme.textColor, fontSize: 15 }]}>
          A empresa {item.vaga?.empresa?.nomeEmpresa} aprovou sua candidatura na vaga: {item.vaga?.nomeVaga}
        </Text>
      </View>
    </View>
  );

  return (
    <SafeAreaView>
      <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
        <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Notificações:</Text>
      </View>
      <View style={{ height: "100%", alignItems: 'center', justifyContent: 'center', paddingBottom: 150, backgroundColor: theme.backgroundColor }}>
        {notifications.length === 0 ? (
          <Text style={[styles.DMSansRegular, { color: theme.textColor, textAlign: "center" }]}>Nenhuma notificação</Text>
        ) : (
          <FlatList
            data={notifications}
            keyExtractor={(item) => item.idVagaUsuario.toString()}
            renderItem={renderItem}
            contentContainerStyle={{ paddingHorizontal: 20 }}
            showsVerticalScrollIndicator={false}
          />
        )}
      </View>
    </SafeAreaView>
  );
}

async function registerForPushNotificationsAsync() {
  let token;
  if (Platform.OS === 'android') {
    await Notifications.setNotificationChannelAsync('default', {
      name: 'default',
      importance: Notifications.AndroidImportance.MAX,
      vibrationPattern: [0, 250, 250, 250],
      lightColor: '#FF231F7C',
    });
  }
  
  if (Constants.isDevice) {
    const { status: existingStatus } = await Notifications.getPermissionsAsync();
    let finalStatus = existingStatus;
    if (existingStatus !== 'granted') {
      const { status } = await Notifications.requestPermissionsAsync();
      finalStatus = status;
    }
    if (finalStatus !== 'granted') {
      alert('Failed to get push token for push notification!');
      return;
    }
    
    try {
      const projectId = Constants?.expoConfig?.extra?.eas?.projectId ?? Constants?.easConfig?.projectId;
      if (!projectId) {
        throw new Error('Project ID not found');
      }
      token = (await Notifications.getExpoPushTokenAsync({ projectId })).data;
      console.log(token);
    } catch (e) {
      token = `${e}`;
    }
  } else {
    alert('Must use physical device for Push Notifications');
  }
  
  return token;
}
