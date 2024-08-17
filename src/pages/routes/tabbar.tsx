import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";

const Tab = createBottomTabNavigator();

import { Ionicons } from "@expo/vector-icons";

import Home from "../home";
import Favs from "../favs";
import Vagas from "../vagas";

export default function TabBar() {
  return (
    <Tab.Navigator
      initialRouteName="Home"
      screenOptions={({ route }) => ({
        tabBarIcon: ({ color, size }) => {
          let iconName;

          if (route.name === "Home") {
            iconName = "home";
          } else if (route.name === "Favs") {
            iconName = "heart";
          } else if (route.name === "Vagas") {
            iconName = "briefcase";
          }

          // Retorna o ícone baseado na rota
          return <Ionicons name={iconName} size={size + 6} color={color} />;
        },
        tabBarActiveTintColor: "#56c596", // Cor do ícone ativo
        tabBarInactiveTintColor: "gray", // Cor do ícone inativo
        tabBarShowLabel: false,
        tabBarStyle: {
          backgroundColor: "#f8f8f8", // Cor de fundo da TabBar
          paddingBottom: 5, // Ajusta o espaçamento
          height: 70,
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
        name="Favs"
        component={Favs}
        options={{ headerShown: false }}
      />
      <Tab.Screen
        name="Vagas"
        component={Vagas}
        options={{ headerShown: false }}
      />
    </Tab.Navigator>
  );
}
