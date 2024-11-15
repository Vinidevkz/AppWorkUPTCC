import React, { useState, useContext, useEffect } from "react";
import { View, Text, SafeAreaView, StatusBar, FlatList, TouchableOpacity } from "react-native";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
import styles from "../styles/vagas.js";
import { useTheme } from "../pages/initialPages/context/themecontext";

import Modal from "react-native-modal";

export default function MinhasVagas({ navigation }) {
  const { theme } = useTheme({ MinhasVagas });
  const { userId, setVagaID } = useContext(Context);
  const { apiNgrokMinhasVagas } = ApisUrls;

  const [dadosUser, setDadosUser] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  const [isModalVisible, setModalVisible] = useState(false);

  const [statusVaga, setStatusVaga] = useState("");
  const [feedback, setFeedback] = useState("")

  // Função para buscar as vagas do usuário
  const fetchUserData = async () => {
    setLoading(true);
    setError(null);

    // Alterar a URL para usar o idUsuario na rota
    const apiUrl = `${apiNgrokMinhasVagas}/${userId}`; // Alterado para incluir o idUsuario na URL
    console.log("Fetching URL:", apiUrl);

    try {
      const response = await fetch(apiUrl);
      if (!response.ok) {
        const errorText = await response.text();
        throw new Error(`Error: ${response.status} - ${errorText}`);
      }

      const data = await response.json(); // Obtém a resposta como JSON
      if (Array.isArray(data)) {
        setDadosUser(data);
        console.log("Fetched user data:", data);
      } else {
        throw new Error("Data returned is not an array");
      }
    } catch (error) {
      setError(error.message);
      console.error("Error fetching user data:", error);
    } finally {
      setLoading(false);
    }
  };

  // useEffect para carregar as vagas ao montar o componente
  useEffect(() => {
    fetchUserData();
  }, [userId]); // Dependência em userId para recarregar se o ID do usuário mudar

  const toggleModal = () => {
    setModalVisible(!isModalVisible);
  };

  const renderItem = ({ item }) => (
    <View
      style={{
        backgroundColor: theme.backgroundColorNavBar,
        marginVertical: 10,
        paddingHorizontal: 10,
        paddingVertical: 15,
        borderRadius: 15,
        elevation: 3,
        flexDirection: "row",
        alignItems: "center",
        justifyContent: "space-between",
      }}
    >
      <View>
        <Text
          style={{
            color: theme.textColor,
            fontFamily: "DMSans-Bold",
            fontSize: 18,
          }}
        >
          {item.vaga.nomeVaga}
        </Text>
        <Text
          style={{
            color: theme.textColor,
            fontFamily: "DMSans-Bold",
            fontSize: 15, paddingVertical: 5
          }}
          numberOfLines={1}
          ellipsizeMode="tail"
        >
          {item.vaga?.empresa?.nomeEmpresa} • {item.vaga.cidadeVaga} • {item.vaga.estadoVaga} 
        </Text>


        <TouchableOpacity
          style={{ borderWidth: 2, borderColor: "#20dd77", borderRadius: 10, padding: 10, minWidth: 50, maxWidth: 100 }}
          onPress={() => {
            toggleModal(), setStatusVaga(item.status?.tipoStatusVaga); setFeedback(item.motivoFeedback)
          }}
        >
          <Text style={[styles.DMSansRegular]}>Status:</Text>
          <Text style={[styles.DMSansRegular, { color: item.status?.tipoStatusVaga === "Chamado" ? "#20dd77" : item.status?.tipoStatusVaga === "Pendente" ? "#898989" : "#ff5447" }]}>{item.status?.tipoStatusVaga}</Text>
        </TouchableOpacity>
      </View>

      <TouchableOpacity
        style={[styles.button, styles.buttonVaga]}
        onPress={() => {
          setVagaID(item.idVaga);
          navigation.navigate("Vagas");
        }}
      >
        <Text style={[styles.buttonText, styles.DMSansBold]}>Ver Vaga</Text>
      </TouchableOpacity>
    </View>
  );

  return (
    <SafeAreaView style={[styles.SafeAreaView, { backgroundColor: theme.backgroundColor }]}>
      <StatusBar backgroundColor={theme.statusBarBackground} barStyle={theme.statusBarColor} />
      <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
        <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Minhas Vagas:</Text>
      </View>
      <FlatList
        data={dadosUser}
        renderItem={renderItem}
        keyExtractor={(item) => item.idVaga.toString()}
        contentContainerStyle={{ padding: 10 }}
        ListEmptyComponent={() =>
          !loading && (
            <Text
              style={{
                color: theme.textColor,
                textAlign: "center",
                marginTop: 20,
              }}
            >
              Você não se candidatou a nenhuma vaga.
            </Text>
          )
        }
      />

      <Modal isVisible={isModalVisible} onBackdropPress={toggleModal}>
        <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
          <View style={{ gap: 10 }}>
            <Text style={[styles.DMSansBold, { fontSize: 18 }]}>Status de sua candidatura:</Text>
            <Text style={[styles.DMSansRegular, { color: statusVaga === "Chamado" ? "#20dd77" : statusVaga === "Pendente" ? "#898989" : "#ff5447", fontSize: 17 }]}>{statusVaga}</Text>

            {statusVaga === "Pendente" ? (
              <View>
                <Text style={[styles.DMSansRegular]}>A vaga ainda está em análise. Por favor, aguarde até o término do processo seletivo para receber um retorno da empresa.</Text>
              </View>
            ) : statusVaga == "Chamado" ? (
              <View>
                <Text style={[styles.DMSansRegular]}>Parabéns! Sua candidatura foi aprovada pela empresa 'Nome da Empresa'. Aguarde o contato diretamente pelo chat ou pelos meios de comunicação cadastrados.</Text>

                <View style={{ marginVertical: 15 }}>
                  <Text style={[styles.DMSansBold]}>Feedback da empresa:</Text>

                  <Text style={[styles.DMSansRegular]}>{feedback}</Text>
                </View>
              </View>
            ) : (
              <View>
                <Text style={[styles.DMSansRegular]}>Infelizmente, sua candidatura não foi aprovada neste processo seletivo. Entendemos que esse não é o resultado esperado, mas não desista! Veja abaixo mais detalhes sobre o resultado e continue explorando outras oportunidades que correspondam ao seu perfil.</Text>

                <View style={{ marginVertical: 15, gap: 5 }}>
                  <Text style={[styles.DMSansBold]}>Feedback da empresa:</Text>

                  <Text style={[styles.DMSansRegular]}>{feedback}</Text>
                </View>
              </View>
            )}
          </View>
          <TouchableOpacity style={[{ backgroundColor: "#20dd77", padding: 10, borderRadius: 20, alignItems: "center", justifyContent: "center", width: 100, alignSelf: "flex-end", marginTop: 20 }]} onPress={() => toggleModal()}>
            <Text style={[styles.DMSansRegular, { color: "#fff" }]}>OK</Text>
          </TouchableOpacity>
        </View>
      </Modal>
    </SafeAreaView>
  );
}
