import React, { useEffect, useState, useContext, useCallback } from "react";
import { SafeAreaView, View, Text, TextInput, TouchableOpacity, FlatList, StatusBar } from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
const { apiNgrokMensagens, apiNgrokMandarMensagem } = ApisUrls;

import Modal from "react-native-modal";

import * as Font from "expo-font";
import styles from "../styles/conversas.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import Feather from '@expo/vector-icons/Feather';

export default function Chat({ navigation }) {
  const { theme } = useTheme({ Chat });
  const { userId, nomeEmpresa, empresaId, idChat, nome, userName } = useContext(Context);
  const [conversa, setConversa] = useState([]);
  const [fontsLoaded, setFontsLoaded] = useState(false);

  const [isModalVisible, setModalVisible] = useState(false);

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

  const toggleModal = () => {
    setModalVisible(!isModalVisible);
  };
  
  return (
    <SafeAreaView style={[styles.SafeAreaView, { backgroundColor: theme.backgroundColor }]}>
      <StatusBar barStyle={theme.textColor} />
      <View style={[styles.navbar, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor }]}>{nomeEmpresa}</Text>
      </View>


      <FlatList
  data={conversa.slice().reverse()} // Inverte os dados para mostrar as mais antigas primeiro
  keyExtractor={(item, index) => index.toString()}
  style={{ flex: 1 }}
  ListHeaderComponent={() => (
    <View style={{ padding: 10, flex: 1, alignItems: 'center', justifyContent: 'center', width: '80%', height: 150, alignSelf: 'center', gap: 10 }}>
      <Feather name="lock" size={30} color="#20dd77" />
      <Text style={[styles.DMSansRegular, {color: theme.textColor, textAlign: "center", fontSize: 13}]}>
        Este é o histórico de sua conversa com a empresa {nomeEmpresa}. Somente você, a empresa e os administradores da WorkUP têm acesso a essas mensagens. Qualquer comportamento que viole as normas do aplicativo deve ser imediatamente reportado à plataforma.
      </Text>
    </View>
  )}
  renderItem={({ item }) => (
    <TouchableOpacity>
      <View style={[item.tipoEmissor === "Usuario" ? styles.msgboxUser : styles.msgboxEmpresa, { marginVertical: 8, marginHorizontal: 15 }]}>
        <View style={[{borderBottomWidth: 1}, item.tipoEmissor === "Usuario" ? {borderColor: "#fff"} : {}]}>
          <Text style={[styles.DMSansRegular, item.tipoEmissor === "Usuario" ? {color: '#fff'} : {color: '#242424'}]}>{item.tipoEmissor === "Empresa" ? nomeEmpresa : nome}</Text>
        </View>
        <View style={{ alignSelf: "flex-start", marginVertical: 5 }}>
          <Text style={[styles.DMSansRegular, item.tipoEmissor === "Usuario" ? {color: '#fff'} : {color: '#242424'}, {fontSize: 12}]}>{item.mensagem}</Text>
        </View>
        <View>
          <Text style={[styles.DMSansRegular, item.tipoEmissor === "Usuario" ? {color: '#fff'} : {color: '#242424'}, {fontSize: 11}]}>
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
    </TouchableOpacity>

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

      <Modal isVisible={isModalVisible} onBackdropPress={toggleModal}>
        
      </Modal>
    </SafeAreaView>
  );
}
