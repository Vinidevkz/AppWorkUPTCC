import React, { useState, useContext, useEffect } from "react";
import { View, Text, ActivityIndicator, TouchableOpacity, SafeAreaView, ScrollView, Image, Alert } from "react-native";
import Ionicons from "@expo/vector-icons/Ionicons";
import Feather from "@expo/vector-icons/Feather";
import { Context } from "../pages/initialPages/context/provider";
import MaterialIcons from "@expo/vector-icons/MaterialIcons";
import ApisUrls from "../ApisUrls/apisurls.js";
import { useFocusEffect } from "@react-navigation/native";
import axios from "axios";
import styles from "../styles/vagas.js";
import { useTheme } from "../pages/initialPages/context/themecontext";

import Modal from "react-native-modal";

export default function Vaga({ navigation }) {
  const { theme } = useTheme({ Vaga });
  const [loading, setLoading] = useState(true);
  const [infosVaga, setInfosVaga] = useState([]);
  const [candidatureStatus, setCandidatureStatus] = useState({}); // Mapeia o status de candidatura para cada vaga

  const [isModalVisible, setModalVisible] = useState(false);
  const [motivoDenuncia, setMotivoDenuncia] = useState(null);

  const { vagaID, userId } = useContext(Context);
  const { apiNgrokVaga, apiNgrokUsuarioVagaCancelar, apiNgrokVerificarCandidatura, apiNgrokUsuarioVaga, apiNgrokDenunciarVaga } = ApisUrls;

  const toggleModal = () => {
    setModalVisible(!isModalVisible);
  };

  const seCandidatar = async () => {
    console.log("User ID:", userId);

    try {
      const response = await fetch(apiNgrokUsuarioVaga, {
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
        setCandidatureStatus((prev) => ({ ...prev, [vagaID]: true })); // Atualiza o estado apenas para essa vaga
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
      const response = await fetch(`${apiNgrokUsuarioVaga}/${userId}/${vagaID}`, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
      });

      if (response.ok) {
        const data = await response.json();
        Alert.alert("Sucesso", data.message); // Exibe a mensagem de sucesso do backend
        setCandidatureStatus((prev) => ({ ...prev, [vagaID]: false })); // Atualiza o estado para indicar que a candidatura foi cancelada
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
    const apiUrl = `${apiNgrokVaga}${vagaID}`;
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

  const verificarCandidatura = async () => {
    try {
      const response = await fetch(`${apiNgrokVerificarCandidatura}${userId}/${vagaID}`);
      const resp = await response.json();

      if (response.ok) {
        setCandidatureStatus((prev) => ({ ...prev, [vagaID]: resp.isCandidated })); // Atualiza o estado de candidatura
      }
    } catch (error) {
      console.log("Erro ao verificar candidatura:", error);
    }
  };

  const denunciarVaga = async () => {
    if (motivoDenuncia) {
      try {
        const response = await axios.post(apiNgrokDenunciarVaga, {
          idUsuario: userId,
          idVaga: vagaID,
          motivo: motivoDenuncia,
          idStatus: 4,
        });

        if (response.status === 200) {
          Alert.alert("Denúncia enviada com sucesso!", `Opção selecionada: ${motivoDenuncia}`);
          toggleModal(); // Fechar o modal após a denúncia
        } else {
          Alert.alert("Erro", "Erro ao enviar denúncia. Tente novamente.");
        }
      } catch (error) {
        console.error("Erro ao enviar denúncia:", error);

        // Exibe mensagem específica para o usuário com base no tipo de erro
        if (error.response) {
          // Erro no lado do servidor (4xx ou 5xx)
          console.log("Dados do erro:", error.response.data); // Detalhes do erro no backend
          console.log("Status do erro:", error.response.status); // Código de status
          Alert.alert("Erro no servidor", `Não foi possível enviar a denúncia. Código: ${error.response.status}. Detalhes: ${error.response.data.message || "Erro desconhecido."}`);
        } else if (error.request) {
          // Sem resposta do servidor
          console.log("Nenhuma resposta recebida:", error.request);
          Alert.alert("Erro de conexão", "Não foi possível se conectar ao servidor. Verifique sua conexão e tente novamente.");
        } else {
          // Erro desconhecido ou ao configurar a requisição
          console.log("Erro inesperado:", error.message);
          Alert.alert("Erro desconhecido", "Ocorreu um erro inesperado ao enviar a denúncia. Tente novamente.");
        }
      }
    } else {
      Alert.alert("Por favor, selecione uma opção de denúncia.");
    }
  };

  useFocusEffect(
    React.useCallback(() => {
      if (vagaID) {
        buscaVaga();
        verificarCandidatura(); // Verifica se o usuário já se candidatou a essa vaga
      }
    }, [vagaID])
  );

  if (loading) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center", backgroundColor: theme.backgroundColor }}>
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
          <MaterialIcons name="arrow-back-ios" size={20} color={theme.textColor} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor, fontSize: 17 }]}>Sobre esta vaga</Text>
      </View>
      <ScrollView style={{ flex: 1, padding: 20, gap: 50, backgroundColor: theme.backgroundColor }}>
        {infosVaga.map((vaga, index) => (
          <View key={index} style={[styles.infosCont, { gap: 20 }]}>
            <View style={{ flexDirection: "row", justifyContent: "space-between", marginBottom: 15 }}>
              <View>
                <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor }]}>{vaga.nomeVaga}</Text>
                <Text style={[styles.DMSansRegular, styles.corpText, { color: theme.textColor }]}>Oferecido por: {vaga.empresa?.nomeEmpresa}</Text>
                <View style={{ paddingVertical: 3 }}>
                  <Text style={[styles.DMSansRegular, styles.vagaDateText, { color: theme.textColor }]}>
                    publicada em: <Text></Text>
                    {new Date(vaga.created_at).toLocaleString("pt-BR", {
                      day: "2-digit",
                      month: "2-digit",
                      year: "numeric",
                    })}
                  </Text>
                  <Text style={[styles.DMSansRegular, styles.vagaDateText, { color: theme.textColor }]}>se candidatar até: {vaga.prazoVaga}</Text>
                </View>
              </View>
              <View style={[styles.profileIconBox, { borderColor: theme.textColor }]}>
                <Image source={vaga.empresa.fotoEmpresa ? { uri: vaga.empresa?.fotoEmpresa } : require("../../assets/icons/dynamo.png")} style={styles.icon} />
              </View>
            </View>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
              Descrição:{"\n"}
              <Text style={styles.DMSansRegular}>{vaga.descricaoVaga}</Text>
            </Text>
            <View style={{ borderWidth: 2, borderColor: "#c4c4c4", borderRadius: 10, paddingVertical: 10, paddingHorizontal: 10, gap: 10 }}>
              <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
                Diferencial: <Text style={styles.DMSansRegular}>{vaga.diferencialVaga}</Text>
              </Text>
              <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
                Modalidade: <Text style={styles.DMSansRegular}>{vaga.modalidade?.descModalidadeVaga}</Text>
              </Text>
              <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
                Benefícios: <Text style={styles.DMSansRegular}>{vaga.beneficiosVaga}</Text>
              </Text>
              <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
                Salário: <Text style={styles.DMSansRegular}>R${vaga.salarioVaga}</Text>
              </Text>
              <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
                Carga horária: <Text style={styles.DMSansRegular}>{vaga.horarioVaga}</Text>
              </Text>
              <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
                Tipo de contrato: <Text style={styles.DMSansRegular}>{vaga.contratoVaga}</Text>
              </Text>
              <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
                Cidade:{" "}
                <Text style={styles.DMSansRegular}>
                  {vaga.cidadeVaga}, {vaga.estadoVaga}
                </Text>
              </Text>
            </View>
          </View>
        ))}
        <View style={[styles.infosCont, styles.row, { alignItems: "center", justifyContent: "space-between" }]}>
          {candidatureStatus[vagaID] ? (
            <TouchableOpacity style={[styles.button, { backgroundColor: theme.backgroundColor, borderWidth: 2, borderColor: "#20dd77" }]} onPress={() => cancelarCandidatura()}>
              <Text style={[styles.DMSansBold, styles.buttonText, { color: theme.textColor }]}>Cancelar Candidatura</Text>
            </TouchableOpacity>
          ) : (
            <TouchableOpacity style={styles.button} onPress={() => seCandidatar()}>
              <Text style={[styles.DMSansBold, styles.buttonText, { color: "#fff" }]}>Candidatar-se</Text>
            </TouchableOpacity>
          )}

          <Modal isVisible={isModalVisible} onBackdropPress={toggleModal}>
            <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
              <Text style={[styles.DMSansBold, { marginBottom: 10, color: theme.textColor }]}>Selecione o motivo da denúncia:</Text>

              <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 5, borderRadius: 10 }}>
                {["Conteúdo impróprio", "Spam ou fraude", "Discriminação ou Preconceito", "Exploração de Trabalho", "Salário ou Benefícios Ilegais"].map((opcao) => (
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
              <TouchableOpacity style={[styles.button, { marginTop: 20 }]} onPress={denunciarVaga}>
                <Text style={styles.buttonText}>Confirmar</Text>
              </TouchableOpacity>
            </View>
          </Modal>
        </View>
        <TouchableOpacity style={{ marginRight: 20, borderWidth: 2, borderColor: "#ff5447", padding: 10, borderRadius: 50, alignItems: "center", justifyContent: "center", width: "100%" }} onPress={toggleModal}>
          <Text style={[styles.DMSansRegular, { color: theme.textColor }]}>Denunciar vaga</Text>
        </TouchableOpacity>
      </ScrollView>
    </SafeAreaView>
  );
}
