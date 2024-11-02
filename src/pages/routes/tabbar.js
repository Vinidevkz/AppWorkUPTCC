import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import { useState } from "react";

const Tab = createBottomTabNavigator();

import { Ionicons } from "@expo/vector-icons";
import FontAwesome6 from '@expo/vector-icons/FontAwesome6';
import FontAwesome5 from '@expo/vector-icons/FontAwesome5';
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
        tabBarIcon: ({ color, size, focused }) => {
          if (route.name === "Home") {
            return <MaterialCommunityIcons name={focused ? 'home-variant' : 'home-variant-outline'} size={size + 4} color={color} />;
          } else if (route.name === "Search") {
            return <Ionicons name={focused ? 'search' : 'search-outline'} size={size + 4} color={color} />;
          } else if (route.name === "Notifications") {
            return <MaterialCommunityIcons name={focused ? 'bell' : 'bell-outline'} size={size + 4} color={color} />;
          } else if (route.name === "Profile") {
            return <FontAwesome5 name={focused ? 'user-alt' : 'user'} size={size + 2} color={color} />;
          }
        },
        tabBarActiveTintColor: "#20dd77", 
        tabBarInactiveTintColor: theme.tabBarIconColor, 
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