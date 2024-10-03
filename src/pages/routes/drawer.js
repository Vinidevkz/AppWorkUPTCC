import { createDrawerNavigator } from "@react-navigation/drawer";
import { NavigationContainer } from "@react-navigation/native";
import MaterialIcons from "@expo/vector-icons/MaterialIcons";
import Ionicons from "@expo/vector-icons/Ionicons";

import MinhasVagas from "../minhasvagas.js";
import VagasSalvas from "../vagassalvas.js";
import Vagas from "../vagas.js";
import Home from "../home.js";

import styles from "../../styles/home";

import { useTheme } from "../../pages/initialPages/context/themecontext";

import * as Font from "expo-font";
import { useEffect } from "react";

const loadFonts = async () => {
  await Font.loadAsync({
    DMSansRegular: require("../../../assets/fonts/DMSans-Regular.ttf"), // Caminho para sua fonte
  });
};

const Drawer = createDrawerNavigator();

export default function AppDrawer() {
  useEffect(() => {
    loadFonts();
  }, []);

  const { theme } = useTheme({ AppDrawer });
  return (
    <NavigationContainer independent={true}>
      <Drawer.Navigator
        initialRouteName="Home"
        drawerPosition="right"
        screenOptions={{
          drawerStyle: {
            backgroundColor: theme.backgroundColor,
            width: 220,
            paddingTop: 20,
          },
        }}
      >
        <Drawer.Screen
          name="Home"
          component={Home}
          options={{
            headerShown: false,
            drawerItemStyle: { display: "none" }, // Oculta a tela Home no drawer
          }}
        />
        <Drawer.Screen
          name="Minhas Vagas"
          component={MinhasVagas}
          options={{
            headerShown: false,
            drawerLabelStyle: {
              color: theme.textColor,
              fontFamily: "DMSansRegular",
              fontSize: 15,
            },
            drawerIcon: ({ color }) => (
              <MaterialIcons
                name="work"
                size={24}
                color={theme.iconColorGreen || color}
              /> // Ícone aqui
            ),
          }}
        />
        <Drawer.Screen
          name="Vagas Salvas"
          component={VagasSalvas}
          options={{
            drawerLabelStyle: {
              color: theme.textColor,
              fontFamily: "DMSansRegular",
              fontSize: 15,
            },
            headerShown: false,
            drawerIcon: ({ color }) => (
              <Ionicons
                name="bookmark" // Usa savedIcons
                size={24}
                color={theme.iconColorGreen || color}
              /> // Ícone aqui
            ),
          }}
        />
        <Drawer.Screen
          name="Vagas"
          component={Vagas}
          options={{
            drawerItemStyle: { display: "none" },
            drawerLabelStyle: {
              color: theme.textColor,
              fontFamily: "DMSansRegular",
              fontSize: 15,
            },
            headerShown: false,
            drawerIcon: ({ color }) => (
              <Ionicons
                name="bookmark" // Usa savedIcons
                size={24}
                color={theme.iconColorGreen || color}
              /> // Ícone aqui
            ),
          }}
        />
      </Drawer.Navigator>
    </NavigationContainer>
  );
}
