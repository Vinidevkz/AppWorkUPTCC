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
import MaterialIcons from "@expo/vector-icons/MaterialIcons";

export default function EmpresaProfile({ navigation }) {
  const { theme } = useTheme({ EmpresaProfile });
  const { userId, empresaId, setVagaID } = useContext(Context);
  const [dadosEmpresa, setDadosEmpresa] = useState([]);
  const [dadosVaga, setDadosVaga] = useState([]);

  const [posts, setPosts] = useState([])

  const [avalicao, setAvalicacao] = useState(null);
  const [motivoDenuncia, setMotivoDenuncia] = useState(null);
  const [toggleModal, setToggleModal] = useState(false);
  const [isModalAvaliarVisible, setModalAvaliarVisible] = useState(false);
  const [isModalDenunciaVisible, setIsModalDenunciaVisible] = useState(false);

  const { apiNgrokEmpresa, apiNgrokVagaEmpresa, apiNgrokDenunciarEmpresa, apiNgrokPostsEmpresa } = ApisUrls;

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

  useFocusEffect(
    React.useCallback(() => {
      async function fetchPostsEmpresa() {
        const apiUrl = `${apiNgrokPostsEmpresa}/${empresaId}`;
        try {
          const response = await fetch(apiUrl);
          if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
          const data = await response.json();

          // Verifique se a data é um objeto e transforme em array
          const postsArray = Array.isArray(data) ? data : [data];
          console.log("Vagas data:", postsArray); // Verifique os dados aqui
          setPosts(postsArray);
          console.log(posts)
        } catch (error) {
          console.error("Error fetching posts data:", error);
        }
      }

      if (empresaId) {
        fetchPostsEmpresa();
      }
    }, [empresaId])
  );

  const denunciarEmpresa = async () => {
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
          toggleModalDenuncia(); // Fechar o modal após a denúncia
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

  const toggleAvaliarModal = () => {
    setModalAvaliarVisible(!isModalAvaliarVisible);
  };

  const toggleModalButton = () => {
    setToggleModal(!toggleModal);
  };

  const toggleModalDenuncia = () => {
    setIsModalDenunciaVisible(!isModalDenunciaVisible);
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

  const post = ({ item }) => (
    <View
      style={{
        alignItems: "center",
        justifyContent: "center",
        width: "100%",
      }}
    >
      <View style={[styles.postCont, { backgroundColor: theme.backgroundColorNavBar }]}>
        <View style={styles.postHeader}>
            <View style={{flexDirection: 'row', alignItems: 'center', gap: 10}}>

                <View style={[styles.postIconBox]}>
                  <Image source={item.empresa?.fotoEmpresa ? {uri:item.empresa?.fotoEmpresa} : require("../../assets/icons/dynamo.png")} style={styles.postIconImg} />
                </View>
                <View>
                  <Text style={[styles.DMSansBold, styles.postTile, { color: theme.textColor }]}>{item.empresa?.nomeEmpresa}</Text>
                  <Text style={[styles.DMSansRegular, styles.dateText, { color: theme.textColor }]}>
                  {new Date(item.created_at).toLocaleString("pt-BR", {
                    day: "2-digit",
                    month: "2-digit",
                    year: "numeric", 
                    hour: "2-digit",
                    minute: "2-digit",
                  })}
                  </Text>
                </View>
          
            </View>

          <TouchableOpacity>
          <Entypo name="dots-three-horizontal" size={30} color={theme.textColor} />
            </TouchableOpacity>
        </View>

        <View style={styles.postBody}>
          <Text style={[styles.DMSansBold, {fontSize: 18, color: theme.textColor}]}>{item.tituloPublicacao}</Text>
          <Text style={[styles.DMSansRegular, styles.postDesc, { color: theme.textColor }]}>{item.detalhePublicacao}</Text>
          {item.fotoPublicacao ?
          <View style={styles.postImgCont}>
            
  <Image
    source={{ uri: item.fotoPublicacao }}
    style={styles.postImg}
    onError={() => {
      // Opcional: Você pode definir um estado aqui se necessário
    }}
  />


          </View>
: <View></View>}

        </View>
      </View>
    </View>
  );

  return (
    <GestureHandlerRootView style={{ flex: 1, backgroundColor: theme.backgroundColor }}>
      <SafeAreaView>
        <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
          <View style={{ flexDirection: "row", alignItems: "center", gap: 10 }}>
            <TouchableOpacity onPress={() => navigation.goBack()}>
              <MaterialIcons name="arrow-back-ios" size={20} color={theme.textColor} />
            </TouchableOpacity>
            <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Perfil da Empresa</Text>
          </View>
          <View>
            <TouchableOpacity onPress={toggleModalButton}>
              <Entypo name="dots-three-horizontal" size={30} color={theme.textColor} />
            </TouchableOpacity>
          </View>
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
                  <Text style={[styles.DMSansBold, styles.profileName, { color: theme.textColor }]}>{dadosEmpresa.nomeEmpresa || <ActivityIndicator size={"small"} color={"#20dd77"} />}</Text>
                  <Text style={[styles.DMSansRegular, styles.profileUserLocation, { color: theme.textColor }]}>
                    {dadosEmpresa.cidadeEmpresa || <ActivityIndicator size={"small"} color={"#20dd77"} />} - {dadosEmpresa.estadoEmpresa || <ActivityIndicator size={"small"} color={"#20dd77"} />}
                  </Text>
                </View>
              </View>

              <View style={styles.profileBioCont}>
                <Text style={[styles.DMSansRegular, styles.text, { color: theme.textColor }]}>{dadosEmpresa.sobreEmpresa || <ActivityIndicator size={"small"} color={"#20dd77"} />}</Text>
              </View>

              <View style={{ flexDirection: "row", alignItems: "center", justifyContent: "space-between" }} /* Avaliações */>
                <Text style={[styles.DMSansBold, { color: theme.textColor }]}>Avaliações da Empresa:</Text>
                <View style={{ flexDirection: "row", alignItems: "center", justifyContent: "center", gap: 5 }}>
                  <Text style={[styles.DMSansRegular, { color: getColorBasedOnAvalicao(dadosEmpresa.avaliacaoEmpresa) }]}>{dadosEmpresa.avaliacaoEmpresa}</Text>
                  {dadosEmpresa.avaliacaoEmpresa === "Muito Positivas" ? <AntDesign name="checkcircle" size={20} color="#20dd77" /> : <Text style={{ color: theme.textColor }}>Sem Avaliações</Text>}
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
                    keyExtractor={(item) => item.idVaga.toString()}
                    renderItem={({ item }) => (
                      <View style={[styles.vagaCont, { backgroundColor: theme.backgroundColorNavBar }]}>
                        <View style={styles.vagaHead}>
                          <Text style={[styles.titleVaga, styles.DMSansBold, { color: theme.textColor }]} numberOfLines={1}>
                            {item.nomeVaga}
                          </Text>
                          <Text style={[styles.dateText, styles.DMSansRegular, { color: theme.textColor }]}>
                            Publicado em:<Text> </Text>
                            {new Date(item.created_at).toLocaleString("pt-BR", {
                              day: "2-digit",
                              month: "2-digit",
                              year: "numeric",
                            })}
                          </Text>
                        </View>
                        <View style={[styles.vagaBody, { gap: 5 }]}>
                          <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Salário: R${item.salarioVaga}</Text>
                          <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Cidade: {item.cidadeVaga}</Text>
                        </View>
                        <View style={styles.vagaFooterCont}>
                          <TouchableOpacity
                            style={[styles.button, styles.buttonVaga, {width: '100%'}]}
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
                    ListEmptyComponent={<Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Nenhuma vaga publicada.</Text>}
                  />
                </View>
              </View>

              <View style={styles.profileSkillsCont}>
                <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Publicações:</Text>
              </View>
              <View style={[styles.line, { borderColor: theme.lineColor }]}></View>


            </View>

            <Modal
              isVisible={toggleModal}
              onBackdropPress={toggleModalButton}
              useNativeDriver={true} // Reduz carga de animação
              hideModalContentWhileAnimating={true} // Evita renderizar enquanto anima
            >
              <View style={{ backgroundColor: theme.backgroundColor, padding: 20, paddingHorizontal: 15, borderRadius: 10 }}>
                <Text style={[styles.DMSansBold, { color: theme.textColor }]}>Opções:</Text>
                <View style={{ paddingTop: 10, gap: 15 }}>
                  <TouchableOpacity
                    style={{ backgroundColor: theme.backgroundColorNavBar, padding: 15, borderRadius: 10 }}
                    onPress={() => {
                      toggleModalButton(), toggleAvaliarModal();
                    }}
                  >
                    <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Avaliar Empresa</Text>
                  </TouchableOpacity>
                  <TouchableOpacity
                    style={{ backgroundColor: theme.backgroundColorNavBar, padding: 15, borderRadius: 10 }}
                    onPress={() => {
                      toggleModalButton(), toggleModalDenuncia();
                    }}
                  >
                    <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Denunciar Empresa</Text>
                  </TouchableOpacity>
                </View>
              </View>
            </Modal>

            <Modal
              isVisible={isModalAvaliarVisible}
              onBackdropPress={toggleAvaliarModal}
              useNativeDriver={true} // Reduz carga de animação
              hideModalContentWhileAnimating={true} // Evita renderizar enquanto anima
            >
              <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
                <Text style={[styles.DMSansBold, { marginBottom: 10, color: theme.textColor, fontSize: 16 }]}>Avaliar Empresa:</Text>
                <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 5, borderRadius: 10 }}>
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
                      {avalicao === opcao && <AntDesign name="check" size={24} color={theme.textColor} />}
                    </TouchableOpacity>
                  ))}
                </View>

                <View style={{ flexDirection: "row", alignItems: "center", justifyContent: "space-between", paddingHorizontal: 15 }}>
                  <TouchableOpacity style={{ marginTop: 20 }} onPress={() => toggleAvaliarModal()}>
                    <Text style={[styles.buttonText, { color: theme.textColor }]}>Fechar</Text>
                  </TouchableOpacity>

                  <TouchableOpacity style={{ marginTop: 20, backgroundColor: '#20dd77', borderRadius: 30, width: 100, alignItems: "center", justifyContent: "center", padding: 10 }} onPress={toggleModal}>
                    <Text style={[styles.buttonText, { color: theme.textColor }]}>Enviar</Text>
                  </TouchableOpacity>
                </View>
              </View>
            </Modal>

            <Modal
              isVisible={isModalDenunciaVisible}
              onBackdropPress={toggleModalDenuncia}
              useNativeDriver={true} // Reduz carga de animação
              hideModalContentWhileAnimating={true} // Evita renderizar enquanto anima
            >
              <View style={{ backgroundColor: theme.backgroundColor, padding: 20, borderRadius: 10 }}>
                <Text style={[styles.DMSansBold, { marginBottom: 10, color: theme.textColor,fontSize: 16 }]}>Denunciar Empresa:</Text>

                <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 5, borderRadius: 10 }}>
                  {["Conteúdo Ofensivo", "Spam", "Preconceito", "Fraude", "Empresa Falsa"].map((opcao) => (
                    <TouchableOpacity
                      key={opcao}
                      onPress={() => setMotivoDenuncia(opcao)}
                      style={{
                        borderWidth: 2,
                        borderColor: motivoDenuncia === opcao ? "#20dd77" : "transparent",
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
                      {motivoDenuncia === opcao && <AntDesign name="check" size={24} color={theme.textColor} />}
                    </TouchableOpacity>
                  ))}
                </View>

                <View style={{ flexDirection: "row", alignItems: "center", justifyContent: "space-between", paddingHorizontal: 15 }}>
                  <TouchableOpacity style={{ marginTop: 20 }} onPress={() => toggleModalDenuncia()}>
                    <Text style={[styles.buttonText, styles.DMSansRegular, { color: theme.textColor }]}>Fechar</Text>
                  </TouchableOpacity>

                  <TouchableOpacity style={{ marginTop: 20, backgroundColor: '#20dd77', borderRadius: 30, width: 100, alignItems: "center", justifyContent: "center", padding: 10 }} onPress={() => {toggleModal, denunciarEmpresa()}}>
                    <Text style={[styles.buttonText, styles.DMSansRegular, { color: '#f4f4f4' }]}>Enviar</Text>
                  </TouchableOpacity>
                </View>
              </View>
            </Modal>
          </View>
          <View
          style={{
            alignItems: "center",
            justifyContent: "center",

          }}
        >
          <FlatList
            data={posts}
            keyExtractor={(item) => item.idPublicacao.toString()}
            renderItem={post}
            scrollEnabled={false}
            ListEmptyComponent={
              <View style={{ flex: 1,  height: 300, alignItems: "center", justifyContent: "center" }}>
                <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Nenhuma publicação encontrada.</Text>
              </View>
            }
            initialNumToRender={10}
          />
        </View>
        </ScrollView>
      </SafeAreaView>
    </GestureHandlerRootView>
  );
}
