import React, { useEffect, useState, useContext, useCallback, useRef } from "react";
import { SafeAreaView, View, Text, TextInput, TouchableOpacity, FlatList, StatusBar } from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
const { apiNgrokMensagens, apiNgrokMandarMensagem } = ApisUrls;

import Modal from "react-native-modal";

import * as Font from "expo-font";
import styles from "../styles/conversas.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import Feather from "@expo/vector-icons/Feather";

export default function Chat({ navigation }) {
  const flatListRef = useRef(null);

  const { theme } = useTheme({ Chat });
  const { userId, nomeEmpresa, empresaId, idChat, nome, userName } = useContext(Context);
  const [conversa, setConversa] = useState([]);
  const [fontsLoaded, setFontsLoaded] = useState(false);

  const [tipoEmissor, setTipoEmissor] = useState("");

  const [isModalMenuVisible, setModalMenuVisible] = useState(false);
  const [isModalDenunciaVisible, setModalDenunciaVisible] = useState(false);
  const [isModalAlterarVisible, setModalAlterarVisible] = useState(false);
  const [isModalDeletarVisible, setModalDeletarVisible] = useState(false);

  const [motivoDenuncia, setMotivoDenuncia] = useState();
  const [mudancaMsg, setMudancaMsg] = useState();

  const [mensagemEnviar, setMensagemEnviar] = useState("");

  const scrollToEnd = () => {
    if (flatListRef.current) {
      setTimeout(() => {
        flatListRef.current.scrollToEnd({ animated: true });
      }, 100); // Ajuste o tempo de delay se necessário
    }
  };

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
        tipoEmissor: "Usuario",
        idChat: idChat,
      };

      console.log("Dados enviados: ", dados, "Url: ", apiNgrokMandarMensagem);

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
      console.log(`${apiNgrokMensagens}/${userId}/${empresaId}`);
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

  const toggleModalMenu = () => {
    setModalMenuVisible(!isModalMenuVisible);
  };

  const toggleModalDenuncias = () => {
    setModalDenunciaVisible(!isModalDenunciaVisible);
  };

  const toggleModalAlterar = () => {
    setModalAlterarVisible(!isModalAlterarVisible);
  };

  const toggleModalDeletar = () => {
    setModalDeletarVisible(!isModalDeletarVisible);
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
        ref={flatListRef}
        data={Array.isArray(conversa) ? conversa.slice().reverse() : []}
        keyExtractor={(item, index) => index.toString()}
        style={{ flex: 1 }}
        onContentSizeChange={scrollToEnd}
        ListHeaderComponent={() => (
          <View style={{ padding: 10, flex: 1, alignItems: "center", justifyContent: "center", width: "80%", height: 150, alignSelf: "center", gap: 10 }}>
            <Feather name="lock" size={30} color="#20dd77" />
            <Text style={[styles.DMSansRegular, { color: theme.textColor, textAlign: "center", fontSize: 13 }]}>Este é o histórico de sua conversa com a empresa {nomeEmpresa}. Somente você, a empresa e os administradores da WorkUP têm acesso a essas mensagens. Qualquer comportamento que viole as normas do aplicativo deve ser imediatamente reportado à plataforma.</Text>
          </View>
        )}
        renderItem={({ item }) => (
          <TouchableOpacity
            onPress={() => {
              toggleModalMenu();
              setMudancaMsg(item.mensagem);
              setTipoEmissor(item.tipoEmissor);
            }}
          >
            <View style={[item.tipoEmissor === "Usuario" ? styles.msgboxUser : styles.msgboxEmpresa, { marginVertical: 8, marginHorizontal: 15 }]}>
              <View style={[{ borderBottomWidth: 1 }, item.tipoEmissor === "Usuario" ? { borderColor: "#fff" } : {}]}>
                <Text style={[styles.DMSansRegular, item.tipoEmissor === "Usuario" ? { color: "#fff" } : { color: "#242424" }]}>{item.tipoEmissor === "Empresa" ? nomeEmpresa : nome}</Text>
              </View>
              <View style={{ alignSelf: "flex-start", marginVertical: 5 }}>
                <Text style={[styles.DMSansRegular, item.tipoEmissor === "Usuario" ? { color: "#fff" } : { color: "#242424" }, { fontSize: 12 }]}>{item.mensagem}</Text>
              </View>
              <View style={{ width: "100%" }}>
                <Text style={[styles.DMSansRegular, item.tipoEmissor === "Usuario" ? { color: "#fff" } : { color: "#242424" }, { fontSize: 11 }]}>
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
        ListEmptyComponent={() => (
          <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
            <Text>Este chat não possuí mensagens.</Text>
          </View>
        )}
      />

      <View style={[styles.msgBox, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TextInput style={[styles.input, { backgroundColor: theme.backgroundColor, color: theme.textColor }]} placeholder="Escreva uma mensagem..." placeholderTextColor={theme.textColor} onChangeText={(text) => setMensagemEnviar(text)} value={mensagemEnviar} />
        <TouchableOpacity
          style={styles.sendBox}
          onPress={() => {
            mandarMensagem(), setMensagemEnviar("");
          }}
        >
          <Ionicons name="send" size={24} color={"#fff"} />
        </TouchableOpacity>
      </View>

      <Modal isVisible={isModalMenuVisible} onBackdropPress={toggleModalMenu}>
        <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
          <Text style={[styles.DMSansBold, { marginBottom: 10, color: theme.textColor }]}>Mensagem:</Text>

          {tipoEmissor === "Usuario" ? (
            <>
              <TouchableOpacity
                style={{ borderRadius: 10, backgroundColor: theme.backgroundColorNavBar, justifyContent: "center", padding: 10, marginVertical: 5 }}
                onPress={() => {
                  toggleModalMenu();
                  toggleModalAlterar();
                }}
              >
                <Text style={[styles.DMSansBold, { color: theme.textColor }]}>Editar Mensagem</Text>
              </TouchableOpacity>

              <TouchableOpacity
                style={{ borderRadius: 10, backgroundColor: theme.backgroundColorNavBar, justifyContent: "center", padding: 10, marginVertical: 5 }}
                onPress={() => {
                  toggleModalMenu();
                  toggleModalDeletar();
                }}
              >
                <Text style={[styles.DMSansBold, { color: theme.textColor }]}>Deletar Mensagem</Text>
              </TouchableOpacity>
            </>
          ) : (
            <TouchableOpacity
              style={{ borderRadius: 10, backgroundColor: theme.backgroundColorNavBar, justifyContent: "center", padding: 10, marginVertical: 5 }}
              onPress={() => {
                toggleModalMenu();
                toggleModalDenuncias();
              }}
            >
              <Text style={[styles.DMSansBold, { color: theme.textColor }]}>Denunciar Mensagem</Text>
            </TouchableOpacity>
          )}
        </View>
      </Modal>

      <Modal isVisible={isModalDenunciaVisible} onBackdropPress={toggleModalDenuncias}>
        <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
          <Text style={[styles.DMSansBold, { marginBottom: 10, color: theme.textColor }]}>Denuncia</Text>

          <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 5, borderRadius: 10 }}>
            {["Conteúdo ofensivo", "Injuria", "Calúnia", "Difamação", "Suborno"].map((opcao) => (
              <TouchableOpacity
                key={opcao}
                onPress={() => setMotivoDenuncia(opcao)}
                style={{
                  borderWidth: 2,
                  borderColor: motivoDenuncia === opcao ? "#20dd77" : "transparent",
                  padding: 10,
                  borderRadius: 5,
                  marginVertical: 5,
                  flexDirection: "row",
                  alignItems: "center",
                  justifyContent: "space-between",
                }}
              >
                <Text style={[styles.DMSansRegular, { color: theme.textColor }]}>{opcao}</Text>

                {motivoDenuncia === opcao && <Feather name="check" size={24} color={theme.textColor} />}
              </TouchableOpacity>
            ))}
          </View>
          <TouchableOpacity
            style={[styles.button, { marginTop: 20 }]}
            //onPress={denunciarVaga}
          >
            <Text style={[styles.buttonText, { color: "#fff" }]}>Confirmar</Text>
          </TouchableOpacity>
        </View>
      </Modal>

      <Modal isVisible={isModalAlterarVisible} onBackdropPress={toggleModalAlterar}>
        <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
          <Text style={[styles.DMSansBold, { marginBottom: 10, color: theme.textColor }]}>Editar Mensagem</Text>

          <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 5, borderRadius: 10 }}>
            <TextInput value={mudancaMsg} onChange={(text) => setMudancaMsg(text)} style={{ color: theme.textColor }} />
          </View>

          <TouchableOpacity
            style={[styles.button, { marginTop: 20 }]}
            //onPress={denunciarVaga}
          >
            <Text style={[styles.buttonText, { color: "#fff" }]}>Confirmar</Text>
          </TouchableOpacity>
        </View>
      </Modal>

      <Modal isVisible={isModalDeletarVisible} onBackdropPress={toggleModalDeletar}>
        <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
          <Text style={[styles.DMSansBold, { marginBottom: 10, color: theme.textColor }]}>Deletar Mensagem</Text>

          <Text style={[styles.DMSansRegular, { color: theme.textColor }]}>Deseja deletar essa mensagem?</Text>

          <View style={{ flexDirection: "row", alignItems: "flex-end", alignSelf: "flex-end", gap: 20 }}>
            <TouchableOpacity
              style={[{ marginTop: 20, padding: 10 }]}
              //onPress={denunciarVaga}
            >
              <Text style={[styles.buttonText, { color: "#ff5447" }]}>Cancelar</Text>
            </TouchableOpacity>

            <TouchableOpacity
              style={[{ marginTop: 20, padding: 10 }]}
              //onPress={denunciarVaga}
            >
              <Text style={[styles.buttonText, { color: theme.textColor, borderBottomWidth: 1, borderColor: "#20dd77" }]}>Confirmar</Text>
            </TouchableOpacity>
          </View>
        </View>
      </Modal>
    </SafeAreaView>
  );
}
