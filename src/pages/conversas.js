import React from "react";
import { useEffect, useState, useContext, useCallback } from "react";
import { SafeAreaView, Text, View, StatusBar, TouchableOpacity, FlatList, Image } from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
const { apiNgrokChats } = ApisUrls;

import * as Font from "expo-font";
import styles from "../styles/conversas.js";
import Ionicons from "@expo/vector-icons/Ionicons";

export default function Conversas({ navigation }) {
  const { theme } = useTheme({ Conversas });
  const [chat, setChat] = useState([]);
  const { userId, setNomeEmpresa, setEmpresaId, setIdChat } = useContext(Context);

  const [fontsLoaded, setFontsLoaded] = useState(false);
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

  const buscaChat = useCallback(async () => {
    try {
      const request = await fetch(`${apiNgrokChats}/${userId}`);
      const response = await request.json();
      setChat(response);
      console.log(response);
    } catch (error) {
      console.log(error);
    }
  }, [apiNgrokChats, userId]);

  useEffect(() => {
    const unsubscribe = navigation.addListener("focus", buscaChat);
    return unsubscribe;
  }, [navigation, buscaChat]);

  /////////////
  const data = [
    { id: "1", fotoempresa: "foto empresa", nomeempresa: "Dynamo", lastmsg: "Ultima Mensagem: 2 horas" },
    { id: "2", fotoempresa: "foto empresa", nomeempresa: "Green Solutions", lastmsg: "Ultima Mensagem: 2 horas" },
  ];

  const renderItem = ({ item }) => (
    <TouchableOpacity
      onPress={() => {
        navigation.navigate("Chat");
        setNomeEmpresa(item.empresa?.nomeEmpresa);
        setEmpresaId(item.empresa?.idEmpresa);
        setIdChat(item.idChat)
      }}
    >
      <View style={styles.item}>
        <View style={{ flexDirection: "row", alignItems: "center", gap: 10 }}>
          <View style={[styles.profileIconBox]}>
            <Image 
            source={item.empresa?.fotoEmpresa ? {uri: item.empresa?.fotoEmpresa} : require('../../assets/img/img1.png')}
            style={styles.icon}/>
          </View>

          <View>
            <Text style={[styles.DMSansBold, { color: theme.textColor }]}>{item.empresa?.nomeEmpresa}</Text>
            <Text style={[styles.DMSansBold, { color: theme.textColor }]}>{item.lastmsg}</Text>
          </View>
        </View>
      </View>
    </TouchableOpacity>
  );
  /////////////

  return (
    <SafeAreaView style={[styles.SafeAreaView, { backgroundColor: theme.backgroundColor }]}>
      <StatusBar barStyle={theme.textColor} />

      <View style={[styles.navbar, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor }]}>Suas Conversas</Text>
      </View>

      <FlatList
        data={chat}
        renderItem={renderItem}
        key={(item) => item.idChat}
        ListEmptyComponent={
          <View style={{ flex: 1, alignItems: "center", justifyContent: "center", height: 700 }}>
            <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Nenhuma conversa iniciada.</Text>
          </View>
        }
      />
    </SafeAreaView>
  );
}
