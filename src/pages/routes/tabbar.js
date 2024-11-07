import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import React from "react";
import { TouchableWithoutFeedback, Animated, View } from "react-native";

const Tab = createBottomTabNavigator();

import { Ionicons } from "@expo/vector-icons";
import FontAwesome5 from '@expo/vector-icons/FontAwesome5';
import MaterialCommunityIcons from '@expo/vector-icons/MaterialCommunityIcons';

import Home from "../home";
import Search from "../search";
import Notifications from "../notifications";
import Profile from "../profile";
import { useTheme } from "../../pages/initialPages/context/themecontext";

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
        tabBarIcon: ({ color, size, focused }) => {
          if (route.name === "Home") {
            return (
              <MaterialCommunityIcons
                name={focused ? 'home-variant' : 'home-variant-outline'}
                size={size + 4}
                color={color}
              />
            );
          } else if (route.name === "Search") {
            return (
              <Ionicons
                name={focused ? 'search' : 'search-outline'}
                size={size + 4}
                color={color}
              />
            );
          } else if (route.name === "Notifications") {
            return (
              <MaterialCommunityIcons
                name={focused ? 'bell' : 'bell-outline'}
                size={size + 4}
                color={color}
              />
            );
          } else if (route.name === "Profile") {
            return (
              <FontAwesome5
                name={focused ? 'user-alt' : 'user'}
                size={size}
                color={color}
              />
            );
          }
        },
        tabBarActiveTintColor: "#20dd77",
        tabBarInactiveTintColor: '#808080',
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
      <Tab.Screen name="Notifications" component={Notifications} options={{ headerShown: false }} />
      <Tab.Screen name="Profile" component={Profile} options={{ headerShown: false }} />
    </Tab.Navigator>
  );
}
