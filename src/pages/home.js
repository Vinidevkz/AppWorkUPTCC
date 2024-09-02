import {
  View,
  Text,
  TouchableOpacity,
  SafeAreaView,
  ScrollView,
  FlatList,
  ActivityIndicator,
  Image,
  StatusBar,
} from "react-native";
import { useState, useEffect } from "react";
import * as Font from "expo-font";
import { useTheme } from "../pages/initialPages/context/themecontext";

//Lib que faz a requisição pra API
import axios from "axios";

//Libs de ícones
import FontAwesome from "@expo/vector-icons/FontAwesome";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";
import SimpleLineIcons from "@expo/vector-icons/SimpleLineIcons";
import Entypo from "@expo/vector-icons/Entypo";

import styles from "../styles/home";

export default function Home({ navigation }) {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [saveIcon, setSaveIcon] = useState(true);
  const [heartIcon, setHeartIcon] = useState(true)
  const { theme, toggleTheme } = useTheme({Home});

  //  useEffect(() => {
  //    async function buscaVaga() {
  //      try {
  //        const response = await axios.get(
  //          "http://10.0.2.2:8000/api/vaga/"
  //        );
  //       setData(response.data);
  //      } catch (error) {
  //        console.error("Error fetching data:", error);
  //        setError(error.message);
  //      } finally {
  //        setLoading(false);
  //      }
  //    }

  //    buscaVaga();
  //  }, []);

  //Carregador de fontes
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
  //

  // RETORNO DA PÁGINA HOME
  return (
    <SafeAreaView style={[styles.SafeAreaView, {backgroundColor: theme.backgroundColor}]}>
            <StatusBar backgroundColor={theme.statusBarBackground} barStyle={theme.statusBarColor} />
      <View style={[styles.navbar, {backgroundColor: theme.backgroundColorNavBar}]}>
        <Image
          source={require("../../assets/icons/WUPlogo.png")}
          style={styles.WUPstyle}
        />
        <View style={styles.iconBox}>
          <TouchableOpacity>
            <Ionicons name="chatbubbles" size={30} color={theme.iconColorWhite} />
          </TouchableOpacity>
          <TouchableOpacity>
            <Entypo name="menu" size={35} color={theme.iconColorWhite} />
          </TouchableOpacity>
        </View>
      </View>

      <ScrollView
        style={styles.ScrollView}
        showsVerticalScrollIndicator={false}
      >
        <View style={styles.titleCont2}>
          <Text style={[styles.title, styles.row, styles.DMSansBold, {color: theme.textColor}]}>
            Vagas para você:
          </Text>
          <TouchableOpacity>
            <FontAwesome name="refresh" size={30} color="#20dd77" />
          </TouchableOpacity>
        </View>

        <FlatList
          horizontal={true}
          data={data}
          style={styles.flatlist}
          keyExtractor={(item) => item.idVaga.toString()} // Ajuste conforme seu dado
          renderItem={({ item }) => (
            <View style={styles.vagaCont}>
              <View style={styles.vagaHead}>
                <Text style={[styles.titleVaga, styles.DMSansBold]}>
                  {item.nomeVaga}
                </Text>
                <Text style={[styles.corpText, styles.DMSansBold]}>
                  oferecido por: {item.idEmpresa?.nomeEmpresa}
                </Text>
                <Text style={[styles.dateText, styles.DMSansRegular]}>
                  publicada em: {item.dataPublicacaoVaga}
                </Text>
              </View>
              <View style={styles.vagaBody}>
                <Text style={[styles.descVaga, styles.DMSansBold]}>
                  Modalidade: {item.modalidadeVaga}
                </Text>
                <Text style={[styles.descVaga, styles.DMSansBold]}>
                  Salário: {item.salarioVaga}
                </Text>
                <Text style={[styles.descVaga, styles.DMSansBold]}>
                  Cidade: {item.cidadeVaga}
                </Text>
              </View>
              <View style={styles.vagaFooterCont}>
                <TouchableOpacity style={[styles.button, styles.buttonVaga]}>
                  <Text style={[styles.buttonText, styles.DMSansBold]}>
                    Ver Vaga
                  </Text>
                </TouchableOpacity>
                <TouchableOpacity
                  style={styles.addFavButton}
                  onPress={() => setSaveIcon(!saveIcon)}
                >
                  <Ionicons
                    name={saveIcon ? "bookmark-outline" : "bookmark"}
                    size={35}
                    color="#20dd77"
                  />
                </TouchableOpacity>
              </View>
            </View>
          )}
        />

        <View style={styles.titleCont}>
          <Text style={[styles.title, styles.DMSansBold, {color: theme.textColor}]}>Outras Vagas:</Text>
          <Text style={[styles.text, styles.DMSansRegular, {color: theme.textColor}]}>
            Veja vagas relacionadas ao que você busca
          </Text>
        </View>

        <ScrollView
          horizontal={true}
          style={styles.vagasScrollView}
          showsHorizontalScrollIndicator={false}
        >
          <View style={[styles.vagaCont, {backgroundColor: theme.backgroundColorNavBar}]}>
            <View style={styles.vagaHead}>
              <Text style={[styles.titleVaga, styles.DMSansBold, {color: theme.textColor}]}>
                Analista de Banco de Dados
              </Text>
              <Text style={[styles.corpText, styles.DMSansBold, {color: theme.textColor}]}>
                oferecido por: Dynamo.inc
              </Text>
              <Text style={[styles.dateText, styles.DMSansRegular, {color: theme.textColor}]}>
                publicado em: 14/05/2024
              </Text>
            </View>
            <View style={styles.vagaBody}>
              <Text style={[styles.descVaga, styles.DMSansBold, {color: theme.textColor}]}>
                Modalidade: Remoto
              </Text>
              <Text style={[styles.descVaga, styles.DMSansBold, {color: theme.textColor}]}>
                Salário: a combinar
              </Text>
              <Text style={[styles.descVaga, styles.DMSansBold, {color: theme.textColor}]}>
                Cidade: São Paulo
              </Text>
            </View>
            <View style={styles.vagaFooterCont}>
              <TouchableOpacity style={[styles.button, styles.buttonVaga]} onPress={() => navigation.navigate('Vaga')}>
                <Text style={[styles.buttonText, styles.DMSansBold]}>
                  Ver Vaga
                </Text>
              </TouchableOpacity>
              <TouchableOpacity
                style={styles.addFavButton}
                onPress={() => setSaveIcon(!saveIcon)}
              >
                <Ionicons
                  name={saveIcon ? "bookmark-outline" : "bookmark"}
                  size={35}
                  color="#20dd77"
                />
              </TouchableOpacity>
            </View>
          </View>
        </ScrollView>

        <View style={styles.titleCont}>
          <Text style={[styles.title, styles.DMSansBold, {color: theme.textColor}]}>Seu Feed:</Text>
        </View>

        {/* <FlatList
          data={vaga}
          renderItem={vagas}
          keyExtractor={(item) => item.id.toString()} // Substitua 'id' pelo campo único da vaga
        /> */}
        <View
          style={{
            alignItems: "center",
            justifyContent: "center",
            width: "100%",
          }}
        >
          <View style={[styles.postCont, {backgroundColor: theme.backgroundColorNavBar}]}>
            <View style={styles.postHeader}>
              <View style={[styles.postIconBox]}>
                <Image
                  source={require("../../assets/icons/dynamo.png")}
                  style={styles.postIconImg}
                />
              </View>
              <View>
                <Text style={[styles.DMSansBold, styles.postTile, {color: theme.textColor}]}>
                  Dynamo Inc
                </Text>
                <Text style={[styles.DMSansRegular, styles.dateText, {color: theme.textColor}]}>
                  publicado em 14/09/2024
                </Text>
              </View>
            </View>

            <View style={styles.postBody}>
              <Text style={[styles.DMSansRegular, styles.postDesc, {color: theme.textColor}]}>
                Comunicado urgente! Abriremos vagas para desenvolvedores
                iniciantes na carreira e que estejam estudando nas seguintes
                áreas: Desenvolvimento de Sistemas Análise em Desenvolvimento de
                Sistemas
              </Text>
              <View style={styles.postImgCont}>
                <Image
                  source={require("../../assets/icons/postbg.jpg")}
                  style={styles.postImg}
                />
              </View>

              <View style={styles.optionsCont}>
                <View style={styles.threeIconsCont}>
                  <TouchableOpacity onPress={() => setHeartIcon(!heartIcon)}>
                    <AntDesign name={heartIcon ? "hearto" : "heart"} size={35} color={theme.iconColorGreen} />
                  </TouchableOpacity>
                  <TouchableOpacity>
                    <Ionicons
                      name="chatbubble-ellipses-outline"
                      size={35}
                      color={theme.iconColorWhite}
                    />
                  </TouchableOpacity>
                  <TouchableOpacity>
                    <Ionicons
                      name="paper-plane-outline"
                      size={35}
                      color={theme.iconColorWhite}
                    />
                  </TouchableOpacity>
                </View>

                <TouchableOpacity>
                  <SimpleLineIcons
                    name="options-vertical"
                    size={30}
                    color={theme.iconColorWhite}
                  />
                </TouchableOpacity>
              </View>
              <View style={styles.postComentCont}>
                <View style={styles.comentHeader}>
                  <View style={styles.comentHeaderP1}>
                    <View style={styles.comentIconBox}>
                      <FontAwesome name="user" size={30} color="black" />
                    </View>
                    <View>
                      <Text style={[styles.DMSansBold, styles.comentTitle, {color: theme.textColor}]}>
                        Marcos Antônio
                      </Text>
                      <Text style={[styles.DMSansRegular, styles.comentDate, {color: theme.textColor}]}>
                        09/04/2024
                      </Text>
                    </View>
                  </View>
                  <TouchableOpacity>
                    <SimpleLineIcons
                      name="options-vertical"
                      size={20}
                      color={theme.iconColorWhite}
                    />
                  </TouchableOpacity>
                </View>
                <View style={styles.comentDescCont}>
                  <Text style={[styles.DMSansRegular, styles.comentDesc, {color: theme.textColor}]}>
                    Boa vaga!
                  </Text>
                </View>
              </View>
            </View>
          </View>
        </View>
      </ScrollView>


    </SafeAreaView>
  );
}
