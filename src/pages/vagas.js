import React, { useState, useContext } from "react";
import { View, Text, ActivityIndicator, TouchableOpacity, SafeAreaView, ScrollView, Image, Alert } from "react-native";
import Ionicons from "@expo/vector-icons/Ionicons";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
import { useFocusEffect } from "@react-navigation/native";
import axios from "axios";
import styles from "../styles/vagas.js";
import { useTheme } from "../pages/initialPages/context/themecontext";

export default function Vaga({ navigation }) {
  const { theme } = useTheme({ Vaga });
  const [loading, setLoading] = useState(true);
  const [infosVaga, setInfosVaga] = useState([]);
  const [isCandidated, setIsCandidated] = useState(false); // Estado para controlar a candidatura

  const { vagaID } = useContext(Context);
  const { userId } = useContext(Context);
  const { apiEmuladorVaga, apiNgrokVaga, apiNgrokUsuarioVaga, apiNgrokUsuarioVagaCancelar, apiEmuladorUsuarioVagaCancelar, apiEmuladorUsuarioVaga } = ApisUrls;

  const seCandidatar = async () => {
    console.log("User ID:", userId);

    try {
      const response = await fetch(apiEmuladorUsuarioVaga, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          idVaga: vagaID,
          idUsuario: userId,
        }),
      });

      const resp = await response.json();
      console.log(resp);

      if (response.ok) {
        Alert.alert("Parabéns!", resp.message);
        setIsCandidated(true); // Atualiza para indicar que o usuário já se candidatou
      } else {
        alert("Erro ao se candidatar: " + resp.message);
      }
    } catch (error) {
      console.log(error);
      alert("Erro de conexão: " + error.message);
    }
  };

  const cancelarCandidatura = async () => {
    try {
      // Monta a URL com o ID da candidatura
      const response = await fetch(`${apiEmuladorUsuarioVagaCancelar}/${userId}/${vagaID}`, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
      });
  
      if (response.ok) {
        const data = await response.json();
        Alert.alert("Sucesso", data.message); // Exibe a mensagem de sucesso do backend
        setIsCandidated(false); // Atualiza o estado para indicar que a candidatura foi cancelada
      } else {
        const errorData = await response.json();
        Alert.alert("Erro", errorData.message || "Erro ao cancelar a candidatura.");
      }
    } catch (error) {
      console.log("Erro:", error);
      Alert.alert("Erro", "Erro ao cancelar a candidatura: " + error.message);
    }
  };
  
  

  const buscaVaga = async () => {
    setLoading(true);
    const apiUrl = `${apiEmuladorVaga}${vagaID}`;
    console.log("URL da API:", apiUrl);
    try {
      const response = await axios.get(apiUrl);
      const vagasData = Array.isArray(response.data) ? response.data : [response.data];
      setInfosVaga(vagasData);
      console.log("Dados da vaga:", vagasData);
    } catch (error) {
      console.error("Error fetching data:", error);
    } finally {
      setLoading(false);
    }
  };

  useFocusEffect(
    React.useCallback(() => {
      if (vagaID) {
        buscaVaga();
      }
    }, [vagaID])
  );

  if (loading) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }

  if (!Array.isArray(infosVaga) || infosVaga.length === 0) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <Text style={{ color: theme.textColor }}>Nenhuma vaga encontrada.</Text>
      </View>
    );
  }

  return (
    <SafeAreaView style={styles.SafeAreaView}>
      <View style={[styles.navbar, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor }]}>Sobre esta vaga</Text>
      </View>
      <ScrollView style={{ flex: 1, padding: 20, gap: 50, backgroundColor: theme.backgroundColor }}>
        {infosVaga.map((vaga, index) => (
          <View key={index} style={styles.infosCont}>
            <View style={{ flexDirection: "row", justifyContent: "space-between" }}>
              <View>
                <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor }]}>
                  {vaga.nomeVaga}
                </Text>
                <Text style={[styles.DMSansRegular, styles.corpText, { color: theme.textColor }]}>
                  Oferecido por: {vaga.empresa?.nomeEmpresa}
                </Text>
                <View style={{ paddingVertical: 3 }}>
                  <Text style={[styles.DMSansRegular, styles.vagaDateText, { color: theme.textColor }]}>
                    publicada em {vaga.dataPublicacaoVaga}
                  </Text>
                  <Text style={[styles.DMSansRegular, styles.vagaDateText, { color: theme.textColor }]}>
                    se candidatar até {vaga.prazoVaga}
                  </Text>
                </View>
              </View>
              <View style={[styles.profileIconBox, { borderColor: theme.textColor }]}>
                <Image source={require("../../assets/icons/dynamo.png")} style={styles.icon} />
              </View>
            </View>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Descrição: {vaga.descricaoVaga}</Text>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Modalidade: {vaga.modalidadeVaga}</Text>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Salário: {vaga.salarioVaga}</Text>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
              Cidade: {vaga.cidadeVaga}, {vaga.estadoVaga}
            </Text>
          </View>
        ))}
        <View style={[styles.infosCont, styles.row]}>
          {isCandidated ? (
            <TouchableOpacity style={[styles.button, {backgroundColor: '', borderWidth: 2, borderColor: '#20dd77'}]} onPress={() => cancelarCandidatura()}>
              <Text style={[styles.DMSansBold, styles.buttonText, {color: theme.textColor}]}>Cancelar Candidatura</Text>
            </TouchableOpacity>
          ) : (
            <TouchableOpacity style={styles.button} onPress={() => seCandidatar()}>
              <Text style={[styles.DMSansBold, styles.buttonText]}>Candidatar-se</Text>
            </TouchableOpacity>
          )}
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
