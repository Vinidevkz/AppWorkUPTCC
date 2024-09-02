import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import { useState } from "react";

const Tab = createBottomTabNavigator();

import { Ionicons } from "@expo/vector-icons";
import FontAwesome6 from '@expo/vector-icons/FontAwesome6';
import MaterialCommunityIcons from '@expo/vector-icons/MaterialCommunityIcons';

import Home from "../home";
import Search from "../search";
import Notifications from "../notifications";
import Profile from "../profile";
import { useTheme } from "../../pages/initialPages/context/themecontext";

export default function TabBar() {
  const { theme, toggleTheme } = useTheme({Home});
  return (
    <Tab.Navigator
      initialRouteName="Home"
      screenOptions={({ route }) => ({
        tabBarIcon: ({ color, size }) => {
          if (route.name === "Home") {
            return <MaterialCommunityIcons name={'home-variant'} size={size + 4} color={color} />;
          } else if (route.name === "Search") {
            return <Ionicons name={'search'} size={size + 4} color={color} />;
          } else if (route.name === "Notifications") {
            return <MaterialCommunityIcons name={'bell'} size={size + 4} color={color} />;
          } else if (route.name === "Profile") {
            return <FontAwesome6 name={'user-large'} size={size + 2} color={color} />;
          }
        },
        tabBarActiveTintColor: "#56c596", // Cor do ícone ativo
        tabBarInactiveTintColor: "#1b1b1b", // Cor do ícone inativo
        tabBarShowLabel: false,
        tabBarStyle: {
          backgroundColor: theme.backgroundColorNavBar, // Cor de fundo da TabBar
          paddingBottom: 5, // Ajusta o espaçamento
          zIndex: 1,
          height: 60,
          elevation: 20,
          borderTopWidth: 0,
        },
        headerShown: false, // Remove o cabeçalho
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
        options={{ headerShown: false }}
      />
      <Tab.Screen
        name="Profile"
        component={Profile}
        options={{ headerShown: false }}
      />
    </Tab.Navigator>
  );
}


//            <MaterialCommunityIcons name="bell" size={30} color="#808080" />