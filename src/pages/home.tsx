import {
  View,
  Text,
  TextInput,
  TouchableOpacity,
  SafeAreaView,
  ScrollView,
  FlatList,
  ActivityIndicator,
} from "react-native";
import { useState, useEffect } from "react";
import FontAwesome from "@expo/vector-icons/FontAwesome";
import Ionicons from "@expo/vector-icons/Ionicons";

import styles from "../styles/home";

export default function Home() {
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

  // RETORNO DA PÁGINA HOME
  return (
    <SafeAreaView style={styles.SafeAreaView}>
      <ScrollView style={styles.ScrollView}>
        <View style={styles.navbar}>
          <TouchableOpacity>
            <Ionicons name="chatbubbles" size={40} color="#56C596" />
          </TouchableOpacity>
          <TextInput
            placeholder="Pesquise por vagas"
            style={styles.searchbar}
          />

          <View style={styles.iconbox}>
            <TouchableOpacity>
              <FontAwesome name="user" size={30} color="black" />
            </TouchableOpacity>
          </View>
        </View>
        {/* <FlatList
          data={vaga}
          renderItem={vagas}
          keyExtractor={(item) => item.id.toString()} // Substitua 'id' pelo campo único da vaga
        /> */}
      </ScrollView>
    </SafeAreaView>
  );
}
