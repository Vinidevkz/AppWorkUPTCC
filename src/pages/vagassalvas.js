import React from "react";
import { View, Text, ActivityIndicator, TouchableOpacity, SafeAreaView, ScrollView, Image } from "react-native";
import { useState, useContext } from "react";
import Ionicons from "@expo/vector-icons/Ionicons";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
import { useFocusEffect } from "@react-navigation/native";
import axios from "axios";
import styles from "../styles/vagas.js";
import { useTheme } from "../pages/initialPages/context/themecontext";

export default function MinhasVagas({ navigation }) {
   const { theme } = useTheme({ MinhasVagas });
//   const [loading, setLoading] = useState(true);
//   const [infosVaga, setInfosVaga] = useState([]); // Mudei para array

//   const { vagaID } = useContext(Context);
//   const { apiEmuladorVaga } = ApisUrls;

//   const buscaVaga = async () => {
//     setLoading(true);
//     const apiUrl = `${apiEmuladorVaga}${vagaID}`;
//     console.log("URL da API:", apiUrl);
//     try {
//       const response = await axios.get(apiUrl);
//       setInfosVaga(response.data); // Define todos os itens do array
//       console.log("Dados da vaga:", response.data);
//     } catch (error) {
//       console.error("Error fetching data:", error);
//     } finally {
//       setLoading(false);
//     }
//   };

//   useFocusEffect(
//     React.useCallback(() => {
//       if (vagaID) {
//         buscaVaga();
//       }
//     }, [vagaID])
//   );

//   if (loading) {
//     return (
//       <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
//         <ActivityIndicator size="large" color="#20dd77" />
//       </View>
//     );
//   }

  return (
    <SafeAreaView style={styles.SafeAreaView}>
      <ScrollView style={{ flex: 1, padding: 20, gap: 50, backgroundColor:theme.backgroundColor }}>
        <Text>Vagas Salvas</Text>
      </ScrollView>
    </SafeAreaView>
  );
}
