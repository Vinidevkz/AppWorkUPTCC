import React, { useState, useContext } from "react";
import { View, Text, Image, ScrollView, SafeAreaView, TouchableOpacity, Alert, ActivityIndicator } from "react-native";
import { Context } from "../pages/initialPages/context/provider";
import { useTheme } from "../pages/initialPages/context/themecontext";
import styles from "../styles/profile";
import ApisUrls from "../ApisUrls/apisurls.js";
import { useFocusEffect } from "@react-navigation/native";
import { FlatList, GestureHandlerRootView } from "react-native-gesture-handler";
import axios from "axios";


import Modal from "react-native-modal";

import AntDesign from "@expo/vector-icons/AntDesign";
import Entypo from "@expo/vector-icons/Entypo";
import Feather from "@expo/vector-icons/Feather";


export default function EmpresaProfile({ navigation }) {
  const { theme } = useTheme({ EmpresaProfile });
  const { userId, empresaId, setVagaID } = useContext(Context);
  const [dadosEmpresa, setDadosEmpresa] = useState([]);
  const [dadosVaga, setDadosVaga] = useState([]);

  const [avalicao, setAvalicacao] = useState(null);
  const [motivoDenuncia, setMotivoDenuncia] = useState(null);
  const [isModalVisible, setModalVisible] = useState(false);

  const { apiNgrokEmpresa, apiNgrokVagaEmpresa, apiNgrokDenunciarEmpresa } = ApisUrls;

  useFocusEffect(
    React.useCallback(() => {
      async function fetchUserData() {
        const apiUrl = `${apiNgrokEmpresa}${empresaId}`;
        try {
          const response = await fetch(apiUrl);
          if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
          const data = await response.json();
          setDadosEmpresa(data);
          console.log("Dados Empresa", dadosEmpresa);
        } catch (error) {
          console.error("Error fetching user data:", error);
        }
      }

      if (empresaId) {
        fetchUserData();
      }
    }, [empresaId])
  );

  useFocusEffect(
    React.useCallback(() => {
      async function fetchVagaEmpresa() {
        const apiUrl = `${apiNgrokVagaEmpresa}${empresaId}`;
        try {
          const response = await fetch(apiUrl);
          if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
          const data = await response.json();

          // Verifique se a data é um objeto e transforme em array
          const vagasArray = Array.isArray(data) ? data : [data];
          console.log("Vagas data:", vagasArray); // Verifique os dados aqui
          setDadosVaga(vagasArray);
        } catch (error) {
          console.error("Error fetching job data:", error);
        }
      }

      if (empresaId) {
        fetchVagaEmpresa();
      }
    }, [empresaId])
  );

  /*const denunciarEmpresa = async () => {
    if (motivoDenuncia) {
      try {
        const response = await axios.post(apiNgrokDenunciarEmpresa, {
          idUsuario: userId,
          idEmpresa: empresaId, // Atualize para idEmpresa
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

        // Tratamento de erro específico com base na resposta
        if (error.response) {
          console.log("Dados do erro:", error.response.data);
          console.log("Status do erro:", error.response.status);
          Alert.alert("Erro no servidor", `Não foi possível enviar a denúncia. Código: ${error.response.status}. Detalhes: ${error.response.data.message || "Erro desconhecido."}`);
        } else if (error.request) {
          console.log("Nenhuma resposta recebida:", error.request);
          Alert.alert("Erro de conexão", "Não foi possível se conectar ao servidor. Verifique sua conexão e tente novamente.");
        } else {
          console.log("Erro inesperado:", error.message);
          Alert.alert("Erro desconhecido", "Ocorreu um erro inesperado ao enviar a denúncia. Tente novamente.");
        }
      }
    } else {
      Alert.alert("Por favor, selecione uma opção de denúncia.");
    }
  };
*/
 
const toggleModal = () => {
    setModalVisible(!isModalVisible);
  };

  const getColorBasedOnAvalicao = (avaliacao) => {
    if (!avaliacao) return "red";

    switch (avaliacao) {
      case "Muito Positivas":
        return "#20dd77";
      case "Positivas":
        return "blue";
      case "Neutras":
        return "#ff9a36";
      case "Ruins":
        return "#d4552f";
      case "Muito Ruins":
        return "#d4552f";
      default:
        return "black";
    }
  };

  return (
    <GestureHandlerRootView style={{ flex: 1, backgroundColor: theme.backgroundColor }}>
      <SafeAreaView>
        <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
          <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Perfil da Empresa</Text>
          <TouchableOpacity onPress={toggleModal}>
          <Entypo name="dots-three-horizontal" size={30} color={theme.textColor} />
          </TouchableOpacity>
        </View>
        <ScrollView contentContainerStyle={styles.scrollViewContent}>
          <View style={{ width: "100%" }}>
            <View style={styles.profileBackgroundImageCont}>
              <Image source={dadosEmpresa.bannerEmpresa ? { uri: dadosEmpresa.bannerEmpresa } : require("../../assets/icons/profilebgempty.png")} style={styles.profileBackgroundImg} />
              <View style={[styles.profileIconBox, { borderColor: theme.borderColor }]}>
                <Image source={dadosEmpresa.fotoEmpresa ? { uri: dadosEmpresa.fotoEmpresa } : require("../../assets/icons/manicon.jpg")} style={styles.icon} />
              </View>
            </View>

            <View style={[styles.profileCont, { backgroundColor: theme.backgroundColor }]}>
              <View style={[styles.profileHeader]}>
                <View>
                  <Text style={[styles.DMSansBold, styles.profileName, { color: theme.textColor }]}>{dadosEmpresa.nomeEmpresa || <ActivityIndicator size={'small'} color={"#20dd77"}/>}</Text>
                  <Text style={[styles.DMSansRegular, styles.profileUserName, { color: theme.textColor }]}>@{dadosEmpresa.usernameEmpresa || <ActivityIndicator size={'small'} color={"#20dd77"}/>}</Text>
                  <Text style={[styles.DMSansRegular, styles.profileUserLocation, { color: theme.textColor }]}>
                    {dadosEmpresa.cidadeEmpresa || <ActivityIndicator size={'small'} color={"#20dd77"}/>} - {dadosEmpresa.estadoEmpresa || <ActivityIndicator size={'small'} color={"#20dd77"}/>}
                  </Text>
                </View>
              </View>

              <View style={styles.profileBioCont}>
                <Text style={[styles.DMSansRegular, styles.text, { color: theme.textColor }]}>{dadosEmpresa.sobreEmpresa || <ActivityIndicator size={'small'} color={"#20dd77"}/>}</Text>
              </View>

              <View style={{ flexDirection: "row", alignItems: "center", justifyContent: "space-between" }} /* Avaliações */>
                <Text style={[styles.DMSansBold, { color: theme.textColor }]}>Avaliações da Empresa:</Text>
                <View style={{ flexDirection: "row", alignItems: "center", justifyContent: "center", gap: 5 }}>
                  <Text style={[styles.DMSansRegular, { color: getColorBasedOnAvalicao(dadosEmpresa.avaliacaoEmpresa) }]}>{dadosEmpresa.avaliacaoEmpresa}</Text>
                  {dadosEmpresa.avaliacaoEmpresa === "Muito Positivas" ? <AntDesign name="checkcircle" size={20} color="#20dd77" /> : <Text>Sem Avaliações</Text>}
                </View>
              </View>

              <View style={[styles.line, { borderColor: theme.lineColor }]}></View>

              <View
                style={{
                  paddingVertical: 20,
                  paddingHorizontal: 15,
                  gap: 20,
                  borderRadius: 20,
                  borderWidth: 1,
                  borderColor: "#c4c4c4",
                }}
              >
                <View style={[styles.profilePrefsCont]}>
                  <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Vagas em aberto:</Text>
                  <FlatList
                    horizontal={true}
                    data={dadosVaga}
                    style={{ margiRight: 10 }}
                    keyExtractor={(item) => item.idVaga.toString()}
                    renderItem={({ item }) => (
                      <View style={[styles.vagaCont, { backgroundColor: theme.backgroundColorNavBar }]}>
                        <View style={styles.vagaHead}>
                          <Text style={[styles.titleVaga, styles.DMSansBold, { color: theme.textColor }]} numberOfLines={1}>
                            {item.nomeVaga}
                          </Text>
                          <Text style={[styles.dateText, styles.DMSansRegular, { color: theme.textColor }]}>publicada em: {item.prazoVaga}</Text>
                        </View>
                        <View style={[styles.vagaBody, { gap: 5 }]}>
                          <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Salário: R${item.salarioVaga}</Text>
                          <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Cidade: {item.cidadeVaga}</Text>
                        </View>
                        <View style={styles.vagaFooterCont}>
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
                      </View>
                    )}
                    ListEmptyComponent={<Text style={[styles.DMSansRegular]}>Nenhuma vaga publicada.</Text>}
                  />
                </View>
              </View>

              <View style={styles.profileSkillsCont}>
                <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Publicações:</Text>
              </View>
              <View style={[styles.line, { borderColor: theme.lineColor }]}></View>
            </View>

            
            {/* <Modal isVisible={isModalVisible} onBackdropPress={toggleModal}>
              <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
                <Text style={[styles.DMSansBold, { marginBottom: 10, color: theme.textColor }]}>Avaliar Empresa:</Text>

                <View style={{backgroundColor: theme.backgroundColorNavBar, padding: 5, borderRadius: 10 }}>
                {["Muito Bom", "Bom", "Mediana", "Ruim", "Péssima"].map((opcao) => (
                  
                  <TouchableOpacity
                    key={opcao}
                    onPress={() => setAvalicacao(opcao)}
                    style={{
                      borderWidth: 2,
                      borderColor: avalicao === opcao ? "#20dd77" : "transparent",
                      paddingHorizontal: 10,
                      paddingVertical: 5,
                      borderRadius: 5,
                      marginVertical: 5,
                      flexDirection: "row",
                      alignItems: "center",
                      justifyContent: "space-between",
                    }}
                  >
                    <Text style={[styles.DMSansRegular, { color: theme.textColor }]}>{opcao}</Text>

                    {avalicao === opcao && <Feather name="check" size={24} color={theme.textColor} />}
                  </TouchableOpacity>
                  
                ))}
                </View>
                

                <Text style={[styles.DMSansBold, { marginVertical: 10, color: theme.textColor }]}>Denunciar Empresa:</Text>

                <View style={{backgroundColor: theme.backgroundColorNavBar, padding: 5, borderRadius: 10 }}>
                {["Conteúdo impróprio", "Spam ou fraude", "Discriminação ou Preconceito", "Exploração de Trabalho", "Empresa falsa"].map((opcao) => (
  <TouchableOpacity
    key={opcao}
    onPress={() => setMotivoDenuncia(opcao)}
    style={{
      borderWidth: 2,
      borderColor: motivoDenuncia === opcao ? "#d4552f" : "transparent",
      paddingHorizontal: 10,
      paddingVertical: 5,
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
                <View style={{flexDirection: 'row', alignItems: 'center', justifyContent: 'space-around', gap: 10}}>
                <TouchableOpacity style={[styles.button, { width: 200, marginTop: 20, backgroundColor: "#20dd77", alignItems: "center", justifyContent: "center", padding: 10, borderRadius: 20 }]} onPress={(toggleModal(), Alert.alert(''))}>
                  <Text style={styles.buttonText}>Confirmar</Text>
                </TouchableOpacity>

                <TouchableOpacity style={[styles.button, { width: 100, marginTop: 20, backgroundColor: theme.backgroundColorNavBar, alignItems: "center", justifyContent: "center", padding: 10, borderRadius: 20 }]} onPress={toggleModal}>
                  <Text style={[styles.buttonText, {color: theme.textColor}]}>Cancelar</Text>
                </TouchableOpacity>
                </View>
              </View>
            </Modal> */}

          </View>
        </ScrollView>
      </SafeAreaView>
    </GestureHandlerRootView>
  );
}
