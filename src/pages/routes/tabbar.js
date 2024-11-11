import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import React, { useState, useEffect } from "react";
import { TouchableOpacity, TouchableWithoutFeedback, Animated, View } from "react-native";
import { Ionicons } from "@expo/vector-icons";
import FontAwesome5 from '@expo/vector-icons/FontAwesome5';
import MaterialCommunityIcons from '@expo/vector-icons/MaterialCommunityIcons';
import Home from "../home";
import Search from "../search";
import Notifications from "../notifications";
import Profile from "../profile";
import { useTheme } from "../../pages/initialPages/context/themecontext";
import axios from "axios";
import ApisUrls from "../../ApisUrls/apisurls.js";

const Tab = createBottomTabNavigator();

const TabButton = ({ children, onPress }) => {
  const scaleValue = React.useRef(new Animated.Value(1)).current;

  const animateIn = () => {
    Animated.spring(scaleValue, {
      toValue: 0.9,
      useNativeDriver: true,
    }).start();
  };

  const animateOut = () => {
    Animated.spring(scaleValue, {
      toValue: 1,
      useNativeDriver: true,
    }).start();
  };

  return (
    <TouchableWithoutFeedback
      onPressIn={animateIn}
      onPressOut={animateOut}
      onPress={onPress}
    >
      <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center', paddingHorizontal: 20 }}>
        <Animated.View style={{ transform: [{ scale: scaleValue }] }}>
          {children}
        </Animated.View>
      </View>
    </TouchableWithoutFeedback>
  );
};

export default function TabBar() {
  const { theme } = useTheme({ Home });
  const [notifications, setNotifications] = useState([]); // Array para armazenar as notificações
  const [hasNewNotification, setHasNewNotification] = useState(false);
  const [isNotificationScreenFocused, setIsNotificationScreenFocused] = useState(false);

  const { apiEmuladorNotificacoes } = ApisUrls;

  // Verifica as notificações a cada 2 segundos
// No useEffect, adicione uma verificação para evitar duplicatas
useEffect(() => {
  const fetchNotifications = async () => {
    try {
      const userId = 25;
      const response = await axios.get(`${apiEmuladorNotificacoes}/${userId}`);
      const fetchedNotifications = response.data;

      // Checa se há notificações novas para evitar duplicação
      const uniqueNotifications = fetchedNotifications.filter(
        (notification) => !newNotifications.some((n) => n.id === notification.id)
      );

      if (uniqueNotifications.length > 0) {
        setNewNotifications((prevNotifications) => [
          ...prevNotifications,
          ...uniqueNotifications,
        ]);
        setHasNewNotification(true);
      }
    } catch (error) {
      console.log(error);
    }
  };

  // const intervalId = setInterval(fetchNotifications, 2000);
  // return () => clearInterval(intervalId);
}, []);


  // Quando o usuário clicar no ícone de notificações
  const handleNotificationPress = () => {
    setHasNewNotification(false); // Marca as notificações como lidas
    setIsNotificationScreenFocused(true);
  };

  // Funções para definir o foco da tela de notificações
  const handleScreenFocus = () => setIsNotificationScreenFocused(true);
  const handleScreenBlur = () => setIsNotificationScreenFocused(false);

  return (
    <Tab.Navigator
      initialRouteName="Home"
      screenOptions={({ route }) => ({
        tabBarButton: (props) => <TabButton {...props} />,
        tabBarIcon: ({ color, size, focused }) => {
          if (route.name === "Home") {
            return (
              <MaterialCommunityIcons
                name={focused ? "home-variant" : "home-variant-outline"}
                size={size + 4}
                color={color}
              />
            );
          } else if (route.name === "Search") {
            return (
              <Ionicons
                name={focused ? "search" : "search-outline"}
                size={size + 4}
                color={color}
              />
            );
          } else if (route.name === "Notifications") {
            return (
              <View style={{ position: "relative" }}>
                <MaterialCommunityIcons
                  name={focused ? "bell" : "bell-outline"}
                  size={size + 4}
                  color={color}
                />
                {hasNewNotification && !isNotificationScreenFocused ? (
                  <View
                    style={{
                      position: "absolute",
                      top: -5,
                      right: -5,
                      width: 10,
                      height: 10,
                      borderRadius: 5,
                      backgroundColor: "red",
                    }}
                  />
                ) : null}
              </View>
            );
          } else if (route.name === "Profile") {
            return (
              <FontAwesome5
                name={focused ? "user-alt" : "user"}
                size={size}
                color={color}
              />
            );
          }
        },
        tabBarActiveTintColor: "#20dd77",
        tabBarInactiveTintColor: "#808080",
        tabBarShowLabel: false,
        tabBarStyle: {
          backgroundColor: theme.backgroundColorNavBar,
          paddingBottom: 5,
          zIndex: 1,
          height: 60,
          elevation: 20,
          borderTopWidth: 0,
        },
        headerShown: false,
      })}
    >
      <Tab.Screen name="Home" component={Home} options={{ headerShown: false }} />
      <Tab.Screen name="Search" component={Search} options={{ headerShown: false }} />
      <Tab.Screen
        name="Notifications"
        component={Notifications}
        options={{ headerShown: false }}
        listeners={{
          focus: handleScreenFocus,
          blur: handleScreenBlur,
        }}
      />
      <Tab.Screen name="Profile" component={Profile} options={{ headerShown: false }} />
    </Tab.Navigator>
  );
}
