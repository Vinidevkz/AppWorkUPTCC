import { View, Text, TouchableOpacity, SafeAreaView, ScrollView, FlatList, ActivityIndicator, Image, StatusBar, Alert } from "react-native";
import { useState, useEffect, useContext } from "react";
import * as Font from "expo-font";
import { useTheme } from "../pages/initialPages/context/themecontext";
import axios from "axios";
import FontAwesome from "@expo/vector-icons/FontAwesome";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";
import SimpleLineIcons from "@expo/vector-icons/SimpleLineIcons";
import Entypo from "@expo/vector-icons/Entypo";
import ApisUrls from "../ApisUrls/apisurls.js";
const { apiNgrokVaga, apiNgrokSalvarVaga, apiNgrokCancelSalvarVaga, apiNgrokVerificarSalvarVaga, apiNgrokVagaPorArea, apiNgrokOutrasVagas } = ApisUrls;
import styles from "../styles/home";
import { Context } from "../pages/initialPages/context/provider";

import NotificationModal from "./modals/notification.js";
import { useFocusEffect } from "@react-navigation/native";

export default function Home({ navigation }) {
  const [data, setData] = useState(null);
  const [outrasVagas, setOutrasVagas] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [savedIcons, setSavedIcons] = useState({});
  const { theme } = useTheme({ Home });

  const [isProcessing, setIsProcessing] = useState(false);

  const [heartIcon, setHeartIcon] = useState(true);

  const [isModalVisible, setIsModalVisible] = useState(false);

  const { userId, vagaID, setVagaID, areaInt, nome, userName, fotoUsuario } = useContext(Context);

  const buscaVaga = async () => {
    setLoading(true);
    try {
      console.log(`${apiNgrokVagaPorArea}/${areaInt}`);
      const response = await axios.get(`${apiNgrokVagaPorArea}/${areaInt}`);
      setData(response.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error);
      setError(error.message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    buscaVaga();
  }, []);

  const buscaOutrasVaga = async () => {
    setLoading(true);
    try {
      console.log(`${apiNgrokOutrasVagas}/${areaInt}`);
      const response = await axios.get(`${apiNgrokOutrasVagas}/${areaInt}`);
      setOutrasVagas(response.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error);
      setError(error.message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    buscaOutrasVaga();
  }, []);

  const salvarVaga = async (vagaID) => {
    const idUsuario = userId;
    const idVaga = vagaID;
    const url = apiNgrokSalvarVaga;

    const body = {
      idUsuario: idUsuario,
      idVaga: idVaga,
    };

    console.log(url, body);
    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(body),
      });

      if (response.ok) {
        const data = await response.json();
        console.log("Sucesso", data.message);
        setIsModalVisible(true);

        // Esconde o modal após 3 segundos
        setTimeout(() => {
          setIsModalVisible(false);
        }, 3000);
      } else {
        const errorData = await response.json();
        console.error("Erro detalhado", errorData.error);
        Alert.alert("Erro", errorData.message || errorData.error || "Erro ao salvar a vaga.");
      }
    } catch (error) {
      console.error("Erro na requisição:", error);
      Alert.alert("Erro", "Ocorreu um erro na requisição.");
    }
  };

  const removerVagaSalva = async (vagaID) => {
    const idUsuario = userId; // Certifique-se de que userId esteja definido
    const url = apiNgrokCancelSalvarVaga; // Use a URL sem parâmetros na rota

    try {
      const response = await fetch(url, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          idUsuario: idUsuario,
          idVaga: vagaID, // Passa idUsuario e idVaga pelo body
        }),
      });

      if (response.ok) {
        const data = await response.json();
        console.log("Sucesso", data.message);
      } else {
        const errorData = await response.json();
        console.error("Erro detalhado", errorData.error); // Log detalhado do erro
        Alert.alert("Erro", errorData.message || errorData.error || "Erro ao remover a vaga.");
      }
    } catch (error) {
      console.error("Erro na requisição:", error);
      Alert.alert("Erro", "Ocorreu um erro na requisição.");
    }
  };

  const verificarSalvamentoVaga = async (vagaID) => {
    try {
      const request = await fetch(`${apiNgrokVerificarSalvarVaga}/${userId}/${vagaID}`);
      const response = await request.json();
      if (response.isSaved) {
        setSavedIcons((prevState) => ({
          ...prevState,
          [vagaID]: true, // Marca a vaga como salva
        }));
      } else {
        setSavedIcons((prevState) => ({
          ...prevState,
          [vagaID]: false, // Deixa a vaga como não salva
        }));
      }
    } catch (error) {
      //console.error("Erro ao verificar salvamento da vaga:", error);
    }
  };

  useEffect(() => {
    const verificarTodasVagas = async () => {
      if (data) {
        for (let vaga of data) {
          await verificarSalvamentoVaga(vaga.idVaga); // Verifica o status de cada vaga
        }
      }
    };
    verificarTodasVagas();
  }, [data]);
  

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

  if (!fontsLoaded) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }

  const toggleSaveIcon = async (id) => {
    if (isProcessing) return;  // Se já está em processamento, não faz nada
    
    setIsProcessing(true);  // Marca o início do processamento
  
    try {
      if (savedIcons[id]) {
        // Se a vaga já foi salva, remove
        await removerVagaSalva(id);
        setSavedIcons((prev) => ({ ...prev, [id]: false }));
      } else {
        // Caso contrário, salva a vaga
        await salvarVaga(id);
        setSavedIcons((prev) => ({ ...prev, [id]: true }));
      }
    } catch (error) {
      console.error('Erro ao salvar/remover vaga:', error);
    } finally {
      setIsProcessing(false);  // Libera o bloqueio para permitir próximos cliques
    }
  };
  
  
  

  return (
    <SafeAreaView style={[styles.SafeAreaView, { backgroundColor: theme.backgroundColor }]}>
      <StatusBar backgroundColor={theme.statusBarBackground} barStyle={theme.statusBarColor} />
      <View style={[styles.navbar, { backgroundColor: theme.backgroundColorNavBar }]}>

      <View style={{flexDirection: 'row', alignItems: 'center', gap: 10}}>
      <View
              style={[
                styles.profileIconBox,
                { borderColor: theme.borderColor },
              ]}
            >
              <Image
                source={fotoUsuario ? { uri: fotoUsuario } : require("../../assets/icons/manicon.jpg")}
                style={styles.icon}
              />
            </View>

            <View>
            <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>@{userName}</Text>
            <Text style={[styles.DMSansBold, {fontSize: 20, color: theme.textColor}]}>{nome}</Text>
            </View>
      </View>

        <View style={styles.iconBox}>
          <TouchableOpacity onPress={() => navigation.navigate("Conversas")}>
            <Ionicons name="chatbubbles-outline" size={35} color={theme.iconColorWhite}  />
          </TouchableOpacity>
        </View>
      </View>

      <ScrollView style={styles.ScrollView} showsVerticalScrollIndicator={false}>
        <View style={styles.titleCont2}>
          <View>
           <Text style={[styles.title, styles.row, styles.DMSansBold, { color: theme.textColor }]}>Vagas para você:</Text>
           <Text style={[styles.text, styles.DMSansRegular, { color: theme.textColor }]}>Filtando de sua preferência: {areaInt}</Text>
          </View>
          <TouchableOpacity onPress={() => {buscaVaga(); buscaOutrasVaga()}}>
            <FontAwesome name="refresh" size={30} color="#20dd77" />
          </TouchableOpacity>
        </View>

        {loading ? (
          <View
            style={{
              width: "100%",
              height: 320,
              alignItems: "center",
              justifyContent: "center",
            }}
          >
            <ActivityIndicator size={"large"} />
          </View>
        ) : (
          <FlatList
            horizontal={true}
            data={data}
            style={styles.flatlist}
            keyExtractor={(item) => item.idVaga.toString()}
            renderItem={({ item }) => (
              <View style={[styles.vagaCont, { backgroundColor: theme.backgroundColorNavBar }]}>
                <View style={styles.vagaHead}>
                  <Text style={[styles.titleVaga, styles.DMSansBold, { color: theme.textColor }]} numberOfLines={1}>
                    {item.nomeVaga}
                  </Text>
                  <Text style={[styles.corpText, styles.DMSansBold, { color: theme.textColor }]}>oferecido por: {item.empresa?.nomeEmpresa}</Text>
                  <Text style={[styles.dateText, styles.DMSansRegular, { color: theme.textColor }]}>publicada em: {item.prazoVaga}</Text>
                </View>
                <View style={[styles.vagaBody, { gap: 5 }]}>
                  <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Modalidade: {item.modalidade?.descModalidadeVaga}</Text>
                  <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Salário: R${item.salarioVaga}</Text>
                  <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Cidade: {item.cidadeVaga}</Text>
                  <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Área: {item.area?.nomeArea || "Não disponível"}</Text>
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
                  <TouchableOpacity
  style={styles.addFavButton}
  onPress={() => toggleSaveIcon(item.idVaga)}  // Chama a função que alterna o ícone
>
  <Ionicons
    name={savedIcons[item.idVaga] ? "bookmark" : "bookmark-outline"} // Alterna o ícone
    size={35}
    color="#20dd77"
  />
</TouchableOpacity>


                </View>
              </View>
            )}
          />
        )}

        <View style={styles.titleCont}>
          <Text style={[styles.title, styles.DMSansBold, { color: theme.textColor }]}>Outras Vagas:</Text>
          <Text style={[styles.text, styles.DMSansRegular, { color: theme.textColor }]}>Veja as outras vagas do app.</Text>
        </View>

        {loading ? (
          <View
            style={{
              width: "100%",
              height: 320,
              alignItems: "center",
              justifyContent: "center",
            }}
          >
            <ActivityIndicator size={"large"} />
          </View>
        ) : (
          <FlatList
            horizontal={true}
            data={outrasVagas}
            style={styles.flatlist}
            keyExtractor={(item) => item.idVaga.toString()}
            renderItem={({ item }) => (
              <View style={[styles.vagaCont, { backgroundColor: theme.backgroundColorNavBar }]}>
                <View style={styles.vagaHead}>
                  <Text style={[styles.titleVaga, styles.DMSansBold, { color: theme.textColor }]} numberOfLines={1}>
                    {item.nomeVaga}
                  </Text>
                  <Text style={[styles.corpText, styles.DMSansBold, { color: theme.textColor }]}>oferecido por: {item.empresa?.nomeEmpresa}</Text>
                  <Text style={[styles.dateText, styles.DMSansRegular, { color: theme.textColor }]}>publicada em: {item.prazoVaga}</Text>
                </View>
                <View style={[styles.vagaBody, { gap: 5 }]}>
                  <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Modalidade: {item.modalidade?.descModalidadeVaga}</Text>
                  <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Salário: R${item.salarioVaga}</Text>
                  <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Cidade: {item.cidadeVaga}</Text>
                  <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Área: {item.area?.nomeArea || "Não disponível"}</Text>
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
                  <TouchableOpacity
  style={styles.addFavButton}
  onPress={() => {
    toggleSaveIcon(item.idVaga);  // Chama a função que alterna o ícone
  }}
>
  <Ionicons
    name={savedIcons[item.idVaga] ? "bookmark" : "bookmark-outline"} // Alterna o ícone
    size={35}
    color="#20dd77"
  />
</TouchableOpacity>

                </View>
              </View>
            )}
          />
        )}

        <View style={styles.titleCont}>
          <Text style={[styles.title, styles.DMSansBold, { color: theme.textColor }]}>Seu Feed:</Text>
        </View>

        <View
          style={{
            alignItems: "center",
            justifyContent: "center",
            width: "100%",
          }}
        >
          <View style={[styles.postCont, { backgroundColor: theme.backgroundColorNavBar }]}>
            <View style={styles.postHeader}>
              <View style={[styles.postIconBox]}>
                <Image source={require("../../assets/icons/dynamo.png")} style={styles.postIconImg} />
              </View>
              <View>
                <Text style={[styles.DMSansBold, styles.postTile, { color: theme.textColor }]}>Dynamo Inc</Text>
                <Text style={[styles.DMSansRegular, styles.dateText, { color: theme.textColor }]}>publicado em 14/09/2024</Text>
              </View>
            </View>

            <View style={styles.postBody}>
              <Text style={[styles.DMSansRegular, styles.postDesc, { color: theme.textColor }]}>Comunicado urgente! Abriremos vagas para desenvolvedores iniciantes na carreira e que estejam estudando nas seguintes áreas: Desenvolvimento de Sistemas Análise em Desenvolvimento de Sistemas</Text>
              <View style={styles.postImgCont}>
                <Image source={require("../../assets/icons/postbg.jpg")} style={styles.postImg} />
              </View>

              <View style={styles.optionsCont}>
                <View style={styles.threeIconsCont}>
                  <TouchableOpacity onPress={() => setHeartIcon(!heartIcon)}>
                    <AntDesign name={heartIcon ? "hearto" : "heart"} size={35} color={theme.iconColorGreen} />
                  </TouchableOpacity>
                  <TouchableOpacity>
                    <Ionicons name="chatbubble-ellipses-outline" size={35} color={theme.iconColorWhite} />
                  </TouchableOpacity>
                  <TouchableOpacity>
                    <Ionicons name="paper-plane-outline" size={35} color={theme.iconColorWhite} />
                  </TouchableOpacity>
                </View>

                <TouchableOpacity>
                  <SimpleLineIcons name="options-vertical" size={30} color={theme.iconColorWhite} />
                </TouchableOpacity>
              </View>
              <View style={styles.postComentCont}>
                <View style={styles.comentHeader}>
                  <View style={styles.comentHeaderP1}>
                    <View style={styles.comentIconBox}>
                      <FontAwesome name="user" size={30} color="black" />
                    </View>
                    <View>
                      <Text style={[styles.DMSansBold, styles.comentTitle, { color: theme.textColor }]}>Marcos Antônio</Text>
                      <Text style={[styles.DMSansRegular, styles.comentDate, { color: theme.textColor }]}>09/04/2024</Text>
                    </View>
                  </View>
                  <TouchableOpacity>
                    <SimpleLineIcons name="options-vertical" size={20} color={theme.iconColorWhite} />
                  </TouchableOpacity>
                </View>
                <View style={styles.comentDescCont}>
                  <Text style={[styles.DMSansRegular, styles.comentDesc, { color: theme.textColor }]}>Boa vaga!</Text>
                </View>
              </View>
            </View>
          </View>
        </View>
      </ScrollView>

      {isModalVisible && <NotificationModal message="Vaga salva com sucesso!" onClose={() => setIsModalVisible(false)} />}
    </SafeAreaView>
  );
}
