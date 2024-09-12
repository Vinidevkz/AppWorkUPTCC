import React from "react";
import {
  View,
  Text,
  Image,
  ActivityIndicator,
  TouchableOpacity,
  StatusBar,
} from "react-native";
import { NavigationContainer } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";
import * as Font from "expo-font";
import { useState, useEffect } from "react";
import { LinearGradient } from "expo-linear-gradient";

const Stack = createNativeStackNavigator();
import SignIN from "../initialPages/signin.js";
import styles from "./styles/welcome";
import { Provider } from "./context/provider";
import { ThemeProvider } from "./context/themecontext.js";

import SignON1 from "../initialPages/signon1.js";
import SignON2 from "./signon2.js";
import SignON3 from "./signon3.js";
import TabBar from "../routes/tabbar.js";
import Home from "../home.js";
import Vaga from "../vagas.js";
import Configurações from "../configuracoes.js";
import ProfileChange from "../profilechange.js";

function Welcome({ navigation }) {
  //Carregador de fontes
  const [fontsLoaded, setFontsLoaded] = useState(false);

  useEffect(() => {
    const loadFonts = async () => {
      await Font.loadAsync({
        "DMSans-Regular": require("../../../assets/fonts/DMSans-Regular.ttf"),
        "DMSans-Bold": require("../../../assets/fonts/DMSans-Bold.ttf"),
      });
      setFontsLoaded(true);
    };

    loadFonts();
  }, []);

  if (!fontsLoaded) {
    return <ActivityIndicator size="large" color="#0000ff" />;
  }

  //Retorno da página de boas-vindas
  return (
    <View style={styles.SafeAreaView}>
      <StatusBar backgroundColor="#fff" barStyle="dark-content" />
      <LinearGradient
        colors={["#fff", "#fff", "#fff", "#20dd77"]}
        style={styles.background}
      />
      <View style={styles.container}>
        <View style={styles.Header}>
          <Image
            source={require("../../../assets/icons/workuplogo.png")}
            style={styles.workuplogo}
          />
          <Text style={[styles.DMSansBold, styles.title]}>
            Aqui você desperta o seu melhor.
          </Text>
        </View>
        <View style={styles.Body}>
          <Image
            source={require("../../../assets/img/img1.png")}
            style={styles.img}
          />
        </View>
        <View style={styles.Bottom}>
          <TouchableOpacity
            onPress={() => navigation.navigate("SignIN")}
            style={[styles.button, styles.loginButton]}
          >
            <Text style={[styles.DMSansBold, styles.buttonText]}>Login</Text>
          </TouchableOpacity>
          <TouchableOpacity
            onPress={() => navigation.navigate("SignON1")}
            style={[styles.button, styles.cadButton]}
          >
            <Text style={[styles.DMSansBold, styles.buttonText, styles.white]}>
              Cadastre-se
            </Text>
          </TouchableOpacity>
          <Text style={[styles.DMSansRegular, styles.title]}>Ou</Text>
          <TouchableOpacity style={[styles.button, styles.googleButton]}>
            <Text style={[styles.DMSansBold, styles.buttonText]}>
              Entre com o
            </Text>
            <Image
              source={require("../../../assets/icons/googleicon.png")}
              style={styles.icon}
            />
          </TouchableOpacity>
        </View>
      </View>
      <View style={styles.Footer}>                              
        <Text style={[styles.DMSansRegular, styles.footerText]}>
          Ao se cadastrar ou logar, você concorda com nossos{" "}
          <TouchableOpacity>
            <Text style={[styles.DMSansBold, styles.touchText]}>
              Termos de Política e Privacidade
            </Text>
          </TouchableOpacity>
        </Text>
        <Text style={[styles.DMSansRegular, styles.footerText]}>
          © 2024 Dynamo. Todos os direitos reservados.
        </Text>
      </View>
    </View>
  );
}

export default function App() {
  return (
    <ThemeProvider>
      <Provider>
        <NavigationContainer independent={true}>
          <Stack.Navigator initialRouteName="Welcome">
            <Stack.Screen
              name="Welcome"
              component={Welcome}
              options={{ headerShown: false }}
            />
            <Stack.Screen
              name="SignIN"
              component={SignIN}
              options={{ headerShown: false }}
            />
            <Stack.Screen
              name="Home"
              component={Home}
              options={{ headerShown: false }}
            />
            <Stack.Screen
              name="TabBar"
              component={TabBar}
              options={{ headerShown: false }}
            />

            <Stack.Screen
              name="SignON1"
              component={SignON1}
              options={{ headerShown: false }}
            />
            <Stack.Screen
              name="SignON2"
              component={SignON2}
              options={{ headerShown: false }}
            />
            <Stack.Screen
              name="SignON3"
              component={SignON3}
              options={{ headerShown: false }}
            />
            <Stack.Screen
              name="Vaga"
              component={Vaga}
              options={{ headerShown: false }}
            />
            <Stack.Screen
              name="Configurações"
              component={Configurações}
              options={{ headerShown: false }}
            />
            <Stack.Screen
              name="ProfileChange"
              component={ProfileChange}
              options={{ headerShown: false }}
            />
          </Stack.Navigator>
        </NavigationContainer>
      </Provider>
    </ThemeProvider>
  );
}
