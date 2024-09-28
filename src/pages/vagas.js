import React, { useState, useContext } from "react";
import { View, Text, ActivityIndicator, TouchableOpacity, SafeAreaView, ScrollView, Image } from "react-native";
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
  const [infosVaga, setInfosVaga] = useState([]); // Inicializa como array

  const { vagaID, userID } = useContext(Context);
  const { apiEmuladorVaga, apiNgrokVaga } = ApisUrls;

  const buscaVaga = async () => {
    setLoading(true);
    const apiUrl = `${apiNgrokVaga}${vagaID}`;
    console.log("URL da API:", apiUrl);
    try {
      const response = await axios.get(apiUrl);
      // Verifica se a resposta é um objeto e o coloca em um array
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
            <View style={{ flexDirection: 'row', justifyContent: 'space-between' }}>
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
                <Image
                  source={require("../../assets/icons/dynamo.png")}
                  style={styles.icon}
                />
              </View>
            </View>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>
              Descrição: {vaga.descricaoVaga}
            </Text>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Modalidade: {vaga.modalidadeVaga}</Text>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Salário: {vaga.salarioVaga}</Text>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Cidade: {vaga.cidadeVaga}, {vaga.estadoVaga}</Text>
          </View>
        ))}
        <View style={[styles.infosCont, styles.row]}>
          <TouchableOpacity style={styles.button}>
            <Text style={[styles.DMSansBold, styles.buttonText]}>Candidatar-se</Text>
          </TouchableOpacity>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
