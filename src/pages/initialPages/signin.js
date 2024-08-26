import React from "react";
import {
  StatusBar,
  View,
  Text,
  TextInput,
  SafeAreaView,
  Image,
  TouchableOpacity,
  ActivityIndicator,
} from "react-native";

import * as Font from "expo-font";
import { useState, useEffect } from "react";

import FontAwesome6 from "@expo/vector-icons/FontAwesome6";
import Ionicons from "@expo/vector-icons/Ionicons";

import styles from "../initialPages/styles/signin.js";

export default function SignIN({navigation}) {
  //Carregador de fontes
  const [fontsLoaded, setFontsLoaded] = useState(false);
  const [passwordVisible, setPasswordVisible] = useState(false);

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
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }
  //

  return (
    <SafeAreaView style={styles.SafeAreaView}>
      <View style={styles.header}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#20dd77" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleHeader]}>Fazer Login</Text>
      </View>
      <View style={styles.loginCont}>
        <Image
          source={require("../../../assets/icons/workuplogo.png")}
          style={styles.workuplogo}
        />
        <Text style={[styles.DMSansBold, styles.title]}>Login</Text>
        <View style={styles.inputCont}>
          <FontAwesome6 name={"user-large"} size={25} color={"#1b1b1b"} />
          <TextInput
            placeholder="Digite seu nome de usuário"
            style={[styles.DMSansRegular, styles.input]}
          />
        </View>

        <View style={styles.inputCont}>
          <FontAwesome6 name={"unlock"} size={25} color={"#1b1b1b"} />
          <TextInput
            placeholder="Digite sua senha"
            style={[styles.DMSansRegular, styles.input]}
            secureTextEntry={!passwordVisible}
          />
          <TouchableOpacity
            onPress={() => setPasswordVisible(!passwordVisible)}
          >
            <FontAwesome6
              name={passwordVisible ? "eye-slash" : "eye"}
              size={25}
              color={"#1b1b1b"}
            />
          </TouchableOpacity>
        </View>

        <TouchableOpacity style={styles.button}>
          <Text style={[styles.DMSansBold, styles.buttonText]}>
            Fazer Login
          </Text>
        </TouchableOpacity>

        <View style={styles.footer}>
          <Text style={styles.DMSansRegular}>Não possui uma conta? </Text>
          <TouchableOpacity style={styles.footerButton}>
            <Text style={styles.DMSansBold}>Faça seu Cadastro</Text>
          </TouchableOpacity>
        </View>
      </View>
      <StatusBar backgroundColor="white" barStyle="dark-content" />
    </SafeAreaView>
  );
}
