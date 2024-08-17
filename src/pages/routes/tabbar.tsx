import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";

const Tab = createBottomTabNavigator();

import { Ionicons } from "@expo/vector-icons";
import FontAwesome6 from '@expo/vector-icons/FontAwesome6';

import Home from "../home";
import Search from "../search";
import Profile from "../profile";

export default function TabBar() {
  return (
    <Tab.Navigator
      initialRouteName="Home"
      screenOptions={({ route }) => ({
        tabBarIcon: ({ color, size }) => {
          if (route.name === "Home") {
            return <Ionicons name={'home'} size={size + 4} color={color} />;
          } else if (route.name === "Search") {
            return <Ionicons name={'search'} size={size + 4} color={color} />;
          } else if (route.name === "Profile") {
            return <FontAwesome6 name={'user-large'} size={size + 2} color={color} />;
          }
        },
        tabBarActiveTintColor: "#56c596", // Cor do ícone ativo
        tabBarInactiveTintColor: "gray", // Cor do ícone inativo
        tabBarShowLabel: false,
        tabBarStyle: {
          backgroundColor: "#1b1b1b", // Cor de fundo da TabBar
          paddingBottom: 5, // Ajusta o espaçamento
          height: 60,
          elevation: 40,
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
        name="Profile"
        component={Profile}
        options={{ headerShown: false }}
      />
    </Tab.Navigator>
  );
}
