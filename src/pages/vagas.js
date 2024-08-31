import React from "react";
import { View, Text, ActivityIndicator, SafeAreaView, ScrollView, Image } from "react-native";
import { useState, useEffect } from "react";
import * as Font from "expo-font";
import Ionicons from "@expo/vector-icons/Ionicons";

import styles from "../styles/vagas.js";

export default function Vaga() {
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

  return (
    <SafeAreaView style={{backgroundColor: '#fff'}}>
      <View style={styles.navbar}>
        <Ionicons name="caret-back-circle-sharp" size={35} color="#1b1b1b" />
        <Text style={[styles.DMSansBold, styles.titleVaga]}>Mais Informações:</Text>
      </View>
      <ScrollView>
        <View style={styles.container}>
          <View style={styles.vagaHeader}>
            <View style={styles.headerTextCont}>
              <Text style={[styles.DMSansBold, styles.titleVaga]}>
                Analista de Banco de Dados
              </Text>
              <Text style={[styles.DMSansRegular, styles.corpText]}>
                Oferecido por: Dynamo Inc.
              </Text>
              <View style={{paddingVertical: 5}}>
                <Text style={[styles.DMSansRegular, styles.vagaDateText]}>publicada em 14/05/2024</Text>
                <Text style={[styles.DMSansRegular, styles.vagaDateText]}>se candidatar até 24/05/2024</Text>
              </View>
            </View>
            <View style={styles.profileIconBox}>
              <Image
                source={require("../../assets/icons/dynamo.png")}
                style={styles.icon}
              />
            </View>
          </View>
          <View style={styles.infosCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Sobre esta vaga:</Text>

            <Text style={[styles.DMSansRegular, styles.text]}>Esta vaga djkasjdaskdjasdjaskdjaskdjakjdkasjdkasjdkajdkasjdkasjdkasjdkasjdkasjdasjdasjdkasjdkajdaksdj</Text>
          </View>
          <View style={styles.infosCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Responsabilidades:</Text>

            <Text style={[styles.DMSansRegular, styles.text]}>Analisar o Banco</Text>
            <Text style={[styles.DMSansRegular, styles.text]}>Analisar o Banco</Text>
            <Text style={[styles.DMSansRegular, styles.text]}>Analisar o Banco</Text>
          </View>
          <View style={styles.infosCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Requisitos:</Text>

            <Text style={[styles.DMSansRegular, styles.text]}>Estar cursando Desenvolvimento de Sistemas ou Ánalise e Desenvolvimento de Sistemas</Text>
            <Text style={[styles.DMSansRegular, styles.title]}>Será um diferencial: Dominar NOSQL</Text>
          </View>
          <View style={styles.infosCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Benefícios:</Text>

            <Text style={[styles.DMSansRegular, styles.text]}>VA, VT e VR</Text>
            <Text style={[styles.DMSansRegular, styles.text]}>GYM Pass</Text>
            <Text style={[styles.DMSansRegular, styles.text]}>Seguro de Vida</Text>
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
