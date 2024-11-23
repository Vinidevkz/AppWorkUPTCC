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
      <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
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
        alignItems: "center", // Centraliza horizontalmente
        justifyContent: "center", // Centraliza verticalmente
        width: 60, // Ajuste uniforme da largura
        height: 70, // Altura para acomodar o texto e o ícone
      };
      

      if (route.name === "Home") {
        return (
<View style={buttonStyle}>

    <MaterialCommunityIcons
      name={focused ? "home-variant" : "home-variant-outline"}
      size={size + 4}
      color={color}
      style={{borderTopWidth: focused ? 3 : null, borderColor: focused ? '#20dd77' : null, width: 50, paddingHorizontal: 10,  paddingVertical: 4}}
    />


  {focused && (
    <Text
      style={{
        color: theme.textColor,
        fontSize: 12,
        fontFamily: 'DMSans-Regular',
        textAlign: 'center', // Garante que o texto fique alinhado ao centro
      }}
    >
      Início
    </Text>
  )}
</View>

        );
      } else if (route.name === "Search") {
        return (
          <View style={buttonStyle}>
            <Ionicons
              name={focused ? "search" : "search-outline"}
              size={size + 4}
              color={color}
              style={{borderTopWidth: focused ? 3 : null, borderColor: focused ? '#20dd77' : null, width: 50, paddingHorizontal: 10, paddingVertical: 4}}
            />
              {focused && (
    <Text
      style={{
        color: theme.textColor,
        fontSize: 12,
        fontFamily: 'DMSans-Regular',
        textAlign: 'center', // Garante que o texto fique alinhado ao centro
      }}
    >
      Pesquisa
    </Text>
  )}
          </View>
        );
      } else if (route.name === "Notifications") {
        return (
          <View style={buttonStyle}>
            <MaterialCommunityIcons
              name={focused ? "bell" : "bell-outline"}
              size={size + 4}
              color={color}
              style={{borderTopWidth: focused ? 3 : null, borderColor: focused ? '#20dd77' : null, width: 50, paddingHorizontal: 10, paddingVertical: 4}}
            />
              {focused && (
    <Text
      style={{
        width: 200,
        color: theme.textColor,
        fontSize: 12,
        fontFamily: 'DMSans-Regular',
        textAlign: 'center', // Garante que o texto fique alinhado ao centro
      }}
    >
      Notificações
    </Text>
  )}
          </View>
        );
      } else if (route.name === "Profile") {
        return (
          <View style={buttonStyle}>
            <FontAwesome5
              name={focused ? "user-alt" : "user"}
              size={size + 2}
              color={color}
              style={{borderTopWidth: focused ? 3 : null, borderColor: focused ? '#20dd77' : null, width: 50, paddingHorizontal: 10, paddingVertical: 4}}
            />
              {focused && (
    <Text
      style={{
        color: theme.textColor,

        fontSize: 12,
        fontFamily: 'DMSans-Regular',
        textAlign: 'center', // Garante que o texto fique alinhado ao centro
      }}
    >
      Currículo
    </Text>
  )}
          </View>
        );
      }
    },
    tabBarActiveTintColor: "#20dd77",
    tabBarInactiveTintColor: "#808080",
    tabBarShowLabel: false,
    tabBarStyle: {
      backgroundColor: theme.backgroundColorNavBar,
      zIndex: 1,
      height: 65,
      elevation: 20,
      borderTopWidth: 0,
      paddingBottom: 10
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
