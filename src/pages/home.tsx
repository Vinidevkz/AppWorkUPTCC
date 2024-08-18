import {
  View,
  Text,
  TextInput,
  TouchableOpacity,
  SafeAreaView,
  ScrollView,
  FlatList,
  ActivityIndicator,
  Image,
  StatusBar
} from "react-native";
import { useState, useEffect } from "react";
import * as Font from "expo-font";

//Libs de ícones
import FontAwesome from "@expo/vector-icons/FontAwesome";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";
import SimpleLineIcons from "@expo/vector-icons/SimpleLineIcons";
import Entypo from '@expo/vector-icons/Entypo';
import MaterialCommunityIcons from '@expo/vector-icons/MaterialCommunityIcons';

import styles from "../styles/home";
import FontLoader from "../styles/fontloader/fontloader";

import { createDrawerNavigator } from '@react-navigation/drawer';

const Drawer = createDrawerNavigator();

import Vagas from '../pages/vagas'
import Favs from '../pages/favs'


export default function Home({ navigation }) {
  // COMUNICAÇÂO COM A API

  // const [vaga, setVaga] = useState("");
  // const [loading, setLoading] = useState(true);

  // const getVagas = async (vagas) => {

  //   try {
  //     const response = await fetch(`URL DA API`);
  //     const json = await response.json();
  //       setVaga(json);
  //   } catch (error) {
  //     console.error(error);
  //   }
  // };

  // const vagas = ({ item }) => {
  //   <View style={styles.vagaCont}>
  //     <Text style={styles.titleVaga}>{item.tituloVaga}</Text>{" "}
  //     <Text style={styles.descVaga}>{item.vagaDesc}</Text>{" "}
  //   </View>;
  // };

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
    return <ActivityIndicator size="large" color="#1b1b1b" />;
  }

  // RETORNO DA PÁGINA HOME
  return (
    <SafeAreaView style={styles.SafeAreaView}>
      <View style={styles.navbar}>
        <TouchableOpacity>
          <Ionicons name="chatbubbles" size={30} color="#808080" />
        </TouchableOpacity>

        <View style={styles.iconbox}>
          <TouchableOpacity>
            <MaterialCommunityIcons name="bell" size={30} color="#808080" />
          </TouchableOpacity>
          <TouchableOpacity onPress={() => navigation.openDrawer()}>
            <Entypo name="menu" size={35} color="#808080" />
          </TouchableOpacity>
        </View>
      </View>
      <ScrollView
        style={styles.ScrollView}
        showsVerticalScrollIndicator={false}
      >
        <View style={styles.titleCont}>
          <Text style={[styles.title, styles.DMSansBold]}>
            Vagas para você:
          </Text>
        </View>

        {/* <FlatList
          data={vaga}
          renderItem={vagas}
          keyExtractor={(item) => item.id.toString()} // Substitua 'id' pelo campo único da vaga
        /> */}

        <ScrollView
          horizontal={true}
          style={styles.vagasScrollView}
          showsHorizontalScrollIndicator={false}
        >
          <View style={styles.vagaCont}>
            <View style={styles.vagaHead}>
              <Text style={[styles.titleVaga, styles.DMSansBold]}>
                Analista de Banco de Dados
              </Text>
              <Text style={[styles.corpText, styles.DMSansBold]}>
                oferecido por: Dynamo.inc
              </Text>
              <Text style={[styles.dateText, styles.DMSansRegular]}>
                publicado em: 14/05/2024
              </Text>
            </View>
            <View style={styles.vagaBody}>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Modalidade: Remoto
              </Text>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Salário: a combinar
              </Text>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Cidade: São Paulo
              </Text>
            </View>
            <TouchableOpacity style={[styles.button, styles.buttonVaga]}>
              <Text style={[styles.buttonText, styles.DMSansBold]}>
                Ver Vaga
              </Text>
            </TouchableOpacity>
          </View>

          <View style={styles.vagaCont}>
            <View style={styles.vagaHead}>
              <Text style={[styles.titleVaga, styles.DMSansBold]}>
                Analista de Banco de Dados
              </Text>
              <Text style={[styles.corpText, styles.DMSansBold]}>
                oferecido por: Dynamo.inc
              </Text>
              <Text style={[styles.dateText, styles.DMSansRegular]}>
                publicado em: 14/05/2024
              </Text>
            </View>
            <View style={styles.vagaBody}>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Modalidade: Remoto
              </Text>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Salário: a combinar
              </Text>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Cidade: São Paulo
              </Text>
            </View>
            <TouchableOpacity style={[styles.button, styles.buttonVaga]}>
              <Text style={[styles.buttonText, styles.DMSansBold]}>
                Ver Vaga
              </Text>
            </TouchableOpacity>
          </View>
        </ScrollView>

        <View style={styles.titleCont}>
          <Text style={[styles.title, styles.DMSansBold]}>Outras Vagas:</Text>
          <Text style={[styles.text, styles.DMSansRegular]}>
            Veja vagas relacionadas ao que você busca
          </Text>
        </View>

        {/* <FlatList
          data={vaga}
          renderItem={vagas}
          keyExtractor={(item) => item.id.toString()} // Substitua 'id' pelo campo único da vaga
        /> */}

        <ScrollView
          horizontal={true}
          style={styles.vagasScrollView}
          showsHorizontalScrollIndicator={false}
        >
          <View style={styles.vagaCont}>
            <View style={styles.vagaHead}>
              <Text style={[styles.titleVaga, styles.DMSansBold]}>
                Analista de Banco de Dados
              </Text>
              <Text style={[styles.corpText, styles.DMSansBold]}>
                oferecido por: Dynamo.inc
              </Text>
              <Text style={[styles.dateText, styles.DMSansRegular]}>
                publicado em: 14/05/2024
              </Text>
            </View>
            <View style={styles.vagaBody}>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Modalidade: Remoto
              </Text>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Salário: a combinar
              </Text>
              <Text style={[styles.descVaga, styles.DMSansBold]}>
                Cidade: São Paulo
              </Text>
            </View>
            <TouchableOpacity style={[styles.button, styles.buttonVaga]}>
              <Text style={[styles.buttonText, styles.DMSansBold]}>
                Ver Vaga
              </Text>
            </TouchableOpacity>
          </View>
        </ScrollView>

        <View style={styles.titleCont}>
          <Text style={[styles.title, styles.DMSansBold]}>Seu Feed:</Text>
        </View>

        {/* <FlatList
          data={vaga}
          renderItem={vagas}
          keyExtractor={(item) => item.id.toString()} // Substitua 'id' pelo campo único da vaga
        /> */}

        <View style={[styles.postCont]}>
          <View style={styles.postHeader}>
            <View style={[styles.postIconBox]}>
              <Image
                source={require("../../assets/icons/dynamo.png")}
                style={styles.postIconImg}
              />
            </View>
            <View>
              <Text style={[styles.DMSansBold, styles.postTile]}>
                Dynamo Inc
              </Text>
              <Text style={[styles.DMSansRegular, styles.dateText]}>
                publicado em 14/09/2024
              </Text>
            </View>
          </View>

          <View style={styles.postBody}>
            <Text style={[styles.DMSansRegular, styles.postDesc]}>
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
                <TouchableOpacity>
                  <AntDesign name="hearto" size={35} color="black" />
                </TouchableOpacity>
                <TouchableOpacity>
                  <Ionicons
                    name="chatbubble-ellipses-outline"
                    size={35}
                    color="black"
                  />
                </TouchableOpacity>
                <TouchableOpacity>
                  <Ionicons
                    name="paper-plane-outline"
                    size={35}
                    color="black"
                  />
                </TouchableOpacity>
              </View>

              <TouchableOpacity>
                <SimpleLineIcons
                  name="options-vertical"
                  size={30}
                  color="black"
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
                    <Text style={[styles.DMSansBold, styles.comentTitle]}>
                      Marcos Antônio
                    </Text>
                    <Text style={[styles.DMSansRegular, styles.comentDate]}>
                      09/04/2024
                    </Text>
                  </View>
                </View>
                <TouchableOpacity>
                  <SimpleLineIcons
                    name="options-vertical"
                    size={20}
                    color="black"
                  />
                </TouchableOpacity>
              </View>
              <View style={styles.comentDescCont}>
                <Text style={[styles.DMSansRegular, styles.comentDesc]}>
                  Boa vaga!
                </Text>
              </View>
            </View>
          </View>
        </View>
      </ScrollView>

      <StatusBar backgroundColor="white" barStyle="dark-content" />
    </SafeAreaView>
  );
}

