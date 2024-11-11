import React, { useEffect, useState, useContext, useCallback } from "react";
import { SafeAreaView, View, Text, TextInput, TouchableOpacity, FlatList, StatusBar } from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
const { apiNgrokMensagens, apiNgrokMandarMensagem } = ApisUrls;

import * as Font from "expo-font";
import styles from "../styles/conversas.js";
import Ionicons from "@expo/vector-icons/Ionicons";

export default function Chat({ navigation }) {
  const { theme } = useTheme({ Chat });
  const { userId, nomeEmpresa, empresaId, idChat, nome } = useContext(Context);
  const [conversa, setConversa] = useState([]);
  const [fontsLoaded, setFontsLoaded] = useState(false);

  const [mensagemEnviar, setMensagemEnviar] = useState('')

  useEffect(() => {
    const loadFonts = async () => {
      await Font.loadAsync({
        "DMSans-Regular": require("../../assets/fonts/DMSans-Regular.ttf"),
        "DMSans-Bold": require("../../assets/fonts/DMSans-Bold.ttf"),
      });
      setFontsLoaded(true);
    };
    loadFonts();
  }, []);

  const mandarMensagem = async () => {
    try {
      const dados = {
        idUsuario: userId,
        idEmpresa: empresaId,
        mensagem: mensagemEnviar,
        tipoEmissor: 'Usuario',
        idChat: idChat,
      };

      console.log("Dados enviados: ", dados, "Url: ", apiNgrokMandarMensagem)
  
      const response = await fetch(apiNgrokMandarMensagem, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(dados),
      });
  
      if (response.ok) {
        const resultado = await response.json();
        console.log("Mensagem enviada:", resultado);
        setConversa(resultado); // Atualizando a conversa
        buscaConversa(); // Recarregar a conversa
      } else {
        console.log("Erro ao enviar mensagem:", response.status);
      }
    } catch (error) {
      console.log("Erro ao enviar mensagem:", error);
    }
  };

  const buscaConversa = useCallback(async () => {
    try {
      const request = await fetch(`${apiNgrokMensagens}/${userId}/${empresaId}`);
      console.log(`${apiNgrokMensagens}/${userId}/${empresaId}`)
      const response = await request.json();
      setConversa(response);
    } catch (error) {
      console.error("Erro ao buscar conversa:", error);
    }
  }, [userId, empresaId]);

  useEffect(() => {
    const unsubscribe = navigation.addListener("focus", buscaConversa);
    return unsubscribe;
  }, [navigation, buscaConversa]);


  
  return (
    <SafeAreaView style={[styles.SafeAreaView, { backgroundColor: theme.backgroundColor }]}>
      <StatusBar barStyle="dark-content" />
      <View style={[styles.navbar, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor }]}>{nomeEmpresa}</Text>
      </View>

      <FlatList
  data={conversa}
  keyExtractor={(item, index) => index.toString()}
  style={{ flex: 1 }}
  inverted  // Isso irá inverter a lista, para exibir as mensagens mais recentes por último
  renderItem={({ item }) => (
<View style={[item.tipoEmissor === 'Usuario' ? styles.msgboxUser : styles.msgboxEmpresa, {margin: 5}]}>
  <View>
    <Text style={[styles.DMSansBold]}>{item.tipoEmissor === "Empresa" ? nomeEmpresa : nome}</Text>
  </View>
  <View style={{alignSelf: 'flex-start'}}>
  <Text style={[styles.DMSansRegular, { color: theme.textColor }]}>{item.mensagem}</Text>
  </View>
  <View>
  <Text style={[styles.DMSansRegular, { color: theme.textColor, fontSize: 11 }]}>
    {new Date(item.mensagemData).toLocaleString("pt-BR", {
      day: "2-digit",
      month: "2-digit",
      year: "numeric",
      hour: "2-digit",
      minute: "2-digit",
    })}
  </Text>
  </View>
</View>

  )}
/>


      <View style={[styles.msgBox, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TextInput
          style={[styles.input, { backgroundColor: theme.backgroundColor, color: theme.textColor }]}
          placeholder="Escreva uma mensagem..."
          placeholderTextColor={theme.textColor}
          onChangeText={(text) => setMensagemEnviar(text)}
          value={mensagemEnviar}
        />
        <TouchableOpacity style={styles.sendBox} onPress={() => {mandarMensagem(), setMensagemEnviar('')}}>
          <Ionicons name="send" size={24} color={"#fff"} />
        </TouchableOpacity>
      </View>
    </SafeAreaView>
  );
}
