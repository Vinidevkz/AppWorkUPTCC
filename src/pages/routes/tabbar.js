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
import ApisUrls from "../../ApisUrls/apisurls.js"; // Certifique-se de que a URL está correta


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
  const [hasNewNotification, setHasNewNotification] = useState(false);
  const [isNotificationScreenFocused, setIsNotificationScreenFocused] = useState(false); // Controle do foco da tela de notificações

  const { apiEmuladorNotificacoes } = ApisUrls;

  // Verifica as notificações a cada 2 segundos
  useEffect(() => {
    const fetchNotifications = async () => {
      try {
        const userId = 25; // Substitua com o ID do usuário, por exemplo, do contexto
        const response = await axios.get(`${apiEmuladorNotificacoes}/${userId}`);

        // Verifique se há novas notificações
        const newNotifications = response.data;
        if (newNotifications.length > 0) {
          // Se houver novas notificações, atualize o estado
          setHasNewNotification(true);
        }
      } catch (error) {
        console.log(error);
      }
    };

    // Realiza a requisição a cada 2 segundos
    const intervalId = setInterval(fetchNotifications, 2000);

    return () => clearInterval(intervalId); // Limpar o intervalo quando o componente desmontar
  }, []); // Empty array significa que o efeito roda apenas ao montar

  // Quando o usuário clicar no ícone de notificações
  const handleNotificationPress = () => {
    // Quando clicar no ícone de notificações, marcamos como "visto"
    setHasNewNotification(false);
    setIsNotificationScreenFocused(true); // A tela de notificações está sendo acessada
  };

  // Função de manipulação de navegação para as telas
  const handleScreenFocus = () => {
    setIsNotificationScreenFocused(true);
  };

  const handleScreenBlur = () => {
    setIsNotificationScreenFocused(false);
  };

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
              <TouchableOpacity onPress={handleNotificationPress}>
                <View style={{ position: "relative" }}>
                  <MaterialCommunityIcons
                    name={focused ? "bell" : "bell-outline"}
                    size={size + 4}
                    color={color}
                  />
                  {hasNewNotification && !isNotificationScreenFocused && (
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
                  )}
                </View>
              </TouchableOpacity>
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
      <Tab.Screen
        name="Home"
        component={Home}
        options={{ headerShown: false }}
      />
      <Tab.Screen
        name="Search"
        component={Search}
        options={{ headerShown: false }}
      />
      <Tab.Screen
        name="Notifications"
        component={Notifications}
        options={{
          headerShown: false,
          tabBarOnPress: handleNotificationPress, // Marca as notificações como lidas ao clicar
        }}
        listeners={{
          focus: handleScreenFocus, // Quando a tela de notificações for focada
          blur: handleScreenBlur, // Quando a tela de notificações for desfocada
        }}
      />
      <Tab.Screen
        name="Profile"
        component={Profile}
        options={{ headerShown: false }}
      />
    </Tab.Navigator>
  );
}
