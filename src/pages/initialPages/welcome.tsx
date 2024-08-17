import React from "react";
import {
  View,
  Text,
  Image,
  SafeAreaView,
  ActivityIndicator,
  TouchableOpacity,
} from "react-native";
import { NavigationContainer } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";
import * as Font from "expo-font";
import { useState, useEffect } from "react";
import { LinearGradient } from "expo-linear-gradient";

const Stack = createNativeStackNavigator();
import TabBar from "../routes/tabbar";
import styles from "./styles/welcome";

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
      <LinearGradient
        colors={["#fff", "#fff", "#fff", "#56c596"]}
        style={styles.background}
      />
      <View style={styles.container}>
        <View style={styles.Header}>
          <Image
            source={require("../../../assets/icons/workuplogo.png")}
            style={styles.workuplogo}
          />
          <Text style={[styles.DMSansBold, styles.title]}>Aqui você desperta o seu melhor.</Text>
        </View>
        <View style={styles.Body}>
          <Image
            source={require("../../../assets/img/img1.png")}
            style={styles.img}
          />
        </View>
        <View style={styles.Bottom}>
          <TouchableOpacity
          onPress={() => navigation.navigate('TabBar')}
            style={[styles.button, styles.loginButton]}
          >
            <Text style={[styles.DMSansBold, styles.buttonText]}>Login</Text>
          </TouchableOpacity>
          <TouchableOpacity
            style={[styles.button, styles.cadButton]}
          >
            <Text style={[styles.DMSansBold, styles.buttonText, styles.white]}>Cadastre-se</Text>
          </TouchableOpacity>
          <Text style={[styles.DMSansRegular, styles.title]}>Ou</Text>
          <TouchableOpacity
            style={[styles.button, styles.googleButton]}
          >
            <Text style={[styles.DMSansBold, styles.buttonText]}>Entre com o </Text>
            <Image source={require('../../../assets/icons/googleicon.png')} style={styles.icon}/>
          </TouchableOpacity>
        </View>

      </View>
      <View style={styles.Footer}>
        <Text style={[styles.DMSansRegular, styles.footerText]}>Ao se cadastrar ou logar, você concorda com nossos <TouchableOpacity><Text style={[styles.DMSansBold, styles.touchText]}>Termos de Política e Privacidade</Text></TouchableOpacity></Text>
        <Text style={[styles.DMSansRegular, styles.footerText]}>© 2024 Dynamo. Todos os direitos reservados.</Text>
      </View>
    </View>
  );
}

export default function App() {
  return (
    <NavigationContainer independent={true}>
      <Stack.Navigator initialRouteName="Welcome">
        <Stack.Screen
          name="Welcome"
          component={Welcome}
          options={{ headerShown: false }}
        />
        <Stack.Screen
          name="TabBar"
          component={TabBar}
          options={{ headerShown: false }}
        />
      </Stack.Navigator>
    </NavigationContainer>
  );
}
