// SignIN Component
import React, { useState, useEffect, useContext } from "react";
import {
  StatusBar,
  View,
  Text,
  TextInput,
  SafeAreaView,
  Image,
  TouchableOpacity,
  ActivityIndicator,
  Alert,
} from "react-native";
import * as Font from "expo-font";
import FontAwesome6 from "@expo/vector-icons/FontAwesome6";
import MaterialIcons from '@expo/vector-icons/MaterialIcons';
import Entypo from "@expo/vector-icons/Entypo";
import Ionicons from "@expo/vector-icons/Ionicons";
import styles from "../initialPages/styles/signin.js";
import { Context } from "./context/provider.js";
import ApisUrls from '../../ApisUrls/apisurls.js';

const { apiNgrok, apiEmulador } = ApisUrls;

export default function SignIN({ navigation }) {
  const [email, setEmail] = useState("");
  const [senha, setSenha] = useState("");
  const { setUserId, setNome, setUserName } = useContext(Context);

  async function verificarUsuario() {
    if (!email || !senha) {
      Alert.alert("Erro", "Por favor, preencha todos os campos obrigatórios.");
      return;
    }

    try {
      const response = await fetch(apiEmulador, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          emailUsuario: email,
          senhaUsuario: senha,
        }),
      });

      const resp = await response.json();
      console.log("Resposta da API:", resp); // Verificar a resposta recebida

      if (response.ok) {
        // Atualize o contexto com os dados do usuário
        setUserId(resp.idUsuario);
        setNome(resp.nomeUsuario);
        setUserName(resp.usernameUsuario);
        setEmail(resp.emailUsuario); // Atualize o email no contexto
        navigation.navigate("TabBar");
      } else {
        const errorMessage = resp.message || "Erro desconhecido.";
        Alert.alert("Erro", `Erro ao logar: ${errorMessage}`);
        console.error("Erro de login:", resp);
      }
    } catch (error) {
      console.error("Erro na tentativa de login:", error);
      Alert.alert(
        "Erro",
        "Ocorreu um erro ao tentar fazer login. Verifique sua conexão ou tente novamente."
      );
    }
  }

  // Carregador de fontes
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

  return (
    <SafeAreaView style={styles.SafeAreaView}>
      <View style={styles.header}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#1b1b1b" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleHeader]}>Fazer Login</Text>
      </View>
      <View style={styles.loginCont}>
        <View style={styles.inputCont}>
          <Entypo
            name="mail"
            size={25}
            color="black"
            style={{ borderRightWidth: 2, paddingRight: 8 }}
          />
          <TextInput
            placeholder="Digite seu email ou usuario"
            style={[styles.DMSansRegular, styles.input]}
            onChangeText={(text) => setEmail(text)}
            value={email}
          />
        </View>

        <View style={styles.inputCont}>
          <FontAwesome6
            name={"unlock"}
            size={25}
            color={"#1b1b1b"}
            style={{ borderRightWidth: 2, paddingRight: 10 }}
          />
          <TextInput
            placeholder="Digite sua senha"
            style={[styles.DMSansRegular, styles.input]}
            secureTextEntry={!passwordVisible}
            onChangeText={(text) => setSenha(text)}
            value={senha}
          />
          <TouchableOpacity
            onPress={() => setPasswordVisible(!passwordVisible)}
          >
            <FontAwesome6
              name={passwordVisible ? "eye-slash" : "eye"}
              size={25}
              color={"#1b1b1b"}
              style={{ paddingHorizontal: 10 }}
            />
          </TouchableOpacity>
        </View>

        <TouchableOpacity style={styles.button} onPress={verificarUsuario}>
          <Text style={[styles.DMSansBold, styles.buttonText]}>
            Fazer Login
          </Text>
          <MaterialIcons name="arrow-forward-ios" size={24} color="black" />
        </TouchableOpacity>

        <View style={styles.footer}>
          <Text style={styles.DMSansRegular}>Não possui uma conta? </Text>
          <TouchableOpacity style={styles.footerButton}>
            <Text style={styles.DMSansBold}>Faça seu Cadastro</Text>
          </TouchableOpacity>
        </View>
      </View>
      <StatusBar backgroundColor="#fff" barStyle="dark-content" />
    </SafeAreaView>
  );
}
