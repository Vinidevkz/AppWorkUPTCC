import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import React, { useState, useEffect } from "react";
import { TouchableOpacity, TouchableWithoutFeedback, Animated, View, Text } from "react-native";
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

  return (
<Tab.Navigator
  initialRouteName="Home"
  screenOptions={({ route }) => ({
    tabBarButton: (props) => <TabButton {...props} />,
    tabBarLabel: ({ focused }) => (focused ? route.name : null),
    tabBarIcon: ({ color, size, focused }) => {
      const buttonStyle = {
        backgroundColor: focused ? 'rgba(60, 230, 139, 0.5)' : 'transparent',
        borderRadius: 20,
        height: 40,
        width: 55,
        marginBottom: 10,
        alignItems: "center",
        justifyContent: "center",
      };
      

      if (route.name === "Home") {
        return (
          <View style={buttonStyle}>
            <MaterialCommunityIcons
              name={focused ? "home-variant" : "home-variant-outline"}
              size={size + 4}
              color={color}
            />
          </View>
        );
      } else if (route.name === "Search") {
        return (
          <View style={buttonStyle}>
            <Ionicons
              name={focused ? "search" : "search-outline"}
              size={size + 4}
              color={color}
            />
          </View>
        );
      } else if (route.name === "Notifications") {
        return (
          <View style={buttonStyle}>
            <MaterialCommunityIcons
              name={focused ? "bell" : "bell-outline"}
              size={size + 4}
              color={color}
            />
          </View>
        );
      } else if (route.name === "Profile") {
        return (
          <View style={buttonStyle}>
            <FontAwesome5
              name={focused ? "user-alt" : "user"}
              size={size}
              color={color}
            />
          </View>
        );
      }
    },
    tabBarActiveTintColor: "#fff",
    tabBarInactiveTintColor: "#808080",
    tabBarShowLabel: false,
    tabBarStyle: {
      backgroundColor: theme.backgroundColorNavBar,
      zIndex: 1,
      height: 70,
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
  />
  <Tab.Screen name="Profile" component={Profile} options={{ headerShown: false }} />
</Tab.Navigator>

  );
}
