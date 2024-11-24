// SignIN Component
import React, { useState, useEffect, useContext } from "react";
import { StatusBar, View, Text, TextInput, SafeAreaView, Image, TouchableOpacity, ActivityIndicator, Alert } from "react-native";
import * as Font from "expo-font";
import FontAwesome6 from "@expo/vector-icons/FontAwesome6";
import MaterialIcons from '@expo/vector-icons/MaterialIcons';
import Entypo from "@expo/vector-icons/Entypo";
import Ionicons from "@expo/vector-icons/Ionicons";
import styles from "../initialPages/styles/signin.js";
import { Context } from "./context/provider.js";
import ApisUrls from "../../ApisUrls/apisurls.js";

const { apiNgrok } = ApisUrls;

export default function SignIN({ navigation }) {
  const [email, setEmail] = useState("");
  const [senha, setSenha] = useState("");
  const { setUserId, setNome, setUserName, setFotoUsuario, setAreaInt } = useContext(Context);
  const [loading, setLoading] = useState(false);

  async function verificarUsuario() {
    setLoading(true);
    if (!email || !senha) {
      Alert.alert("Erro", "Por favor, preencha todos os campos obrigatórios.");
      return;
    }

    try {
      const response = await fetch(apiNgrok, {
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
        setAreaInt(resp.areaInteresseUsuario);
        setFotoUsuario(resp.fotoUsuario)
        navigation.navigate("TabBar");
        setLoading(false);
      } else {
        const errorMessage = resp.message || "Erro desconhecido.";
        Alert.alert("Erro", `Erro ao logar: ${errorMessage}`);
        console.error("Erro de login:", resp);
        setLoading(false);
      }
    } catch (error) {
      console.error("Erro na tentativa de login:", error);
      Alert.alert("Erro", "Ocorreu um erro ao tentar fazer login. Verifique sua conexão ou tente novamente.");
      setLoading(false)
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
      {loading && (
        <View
          style={{
            position: "absolute",
            top: 0,
            left: 0,
            right: 0,
            bottom: 0,
            backgroundColor: "rgba(0, 0, 0, 0.5)",
            justifyContent: "center",
            alignItems: "center",
            zIndex: 1000,
          }}
        >
          <ActivityIndicator size="large" color="#20dd77" />
        </View>
      )}
      <View style={styles.header}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
         <MaterialIcons name="arrow-back-ios" size={20} color={'#1b1b1b'} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleHeader]}>Login</Text>
      </View>
      <View style={styles.loginCont}>
        <View style={styles.inputCont}>
          <Entypo name="mail" size={20} color="black" style={{ borderRightWidth: 2, paddingRight: 8 }} />
          <TextInput placeholder="Digite seu email ou usuario" style={[styles.DMSansRegular, styles.input]} onChangeText={(text) => setEmail(text)} value={email} />
        </View>

        <View style={styles.inputCont}>
          <FontAwesome6 name={"unlock"} size={20} color={"#1b1b1b"} style={{ borderRightWidth: 2, paddingRight: 10 }} />
          <TextInput placeholder="Digite sua senha" style={[styles.DMSansRegular, styles.input]} secureTextEntry={!passwordVisible} onChangeText={(text) => setSenha(text)} value={senha} />
          <TouchableOpacity onPress={() => setPasswordVisible(!passwordVisible)}>
            <FontAwesome6 name={passwordVisible ? "eye-slash" : "eye"} size={25} color={"#1b1b1b"} style={{ paddingHorizontal: 10 }} />
          </TouchableOpacity>
        </View>

        <TouchableOpacity style={styles.button} onPress={verificarUsuario}>
          <Text style={[styles.DMSansBold, styles.buttonText]}>Fazer Login</Text>
        </TouchableOpacity>

        <View style={styles.footer}>
          <Text style={styles.DMSansRegular}>Não possui uma conta? </Text>
          <TouchableOpacity style={styles.footerButton} onPress={() => navigation.navigate("SignON1")}>
            <Text style={styles.DMSansBold}>Faça seu Cadastro</Text>
          </TouchableOpacity>
        </View>
      </View>
      <StatusBar backgroundColor="#fff" barStyle="dark-content" />
    </SafeAreaView>
  );
}
