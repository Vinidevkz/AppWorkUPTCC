import React from "react";
import {
  View,
  Text,
  StyleSheet,
  StatusBar,
  TextInput,
  SafeAreaView,
  ScrollView,
  ActivityIndicator,
  TouchableOpacity,
} from "react-native";

import styles from "../initialPages/styles/signon.js";
import Ionicons from "@expo/vector-icons/Ionicons";

import useFonts from "../../styles/fontloader/fontloader.js";

export default function SignON() {
  //Carregador de fontes
  const fontsLoaded = useFonts();

  if (!fontsLoaded) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }
  //

  return (
    <SafeAreaView>
      <View style={styles.header}>
        <TouchableOpacity>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#20dd77" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title]}>Cadastro</Text>
      </View>

      <ScrollView style={styles.ScrollView}>
        <View style={styles.container}>
          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Nome:</Text>
            <View style={styles.inputCont}>
              <TextInput placeholder="Insira seu nome completo" style={styles.inputText}/>
            </View>
          </View>
          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Nome de usuário:</Text>
            <View style={styles.inputCont}>
              <TextInput placeholder="Insira seu nome de usuário" style={styles.inputText}/>
            </View>
          </View>
          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Idade:</Text>
            <View style={styles.inputCont}>
              <TextInput placeholder="Insira sua idade" style={styles.inputText}/>
            </View>
          </View>
          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Email:</Text>
            <View style={styles.inputCont}>
              <TextInput placeholder="Insira seu email" style={styles.inputText}/>
            </View>
          </View>
          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Senha:</Text>
            <View style={styles.inputCont}>
              <TextInput placeholder="Crie uma senha" style={styles.inputText}/>
            </View>
          </View>
          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Suas Áreas de interesse:</Text>
            <View style={styles.inputCont}>
              <TextInput placeholder="Escolha suas areas de interesse" style={styles.inputText}/>
            </View>
          </View>
          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Contato:</Text>
            <View style={styles.inputCont}>
              <TextInput placeholder="Digite seu telefone" style={styles.inputText}/>
            </View>
          </View>
          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>CEP:</Text>
            <View style={styles.inputCont}>
              <TextInput placeholder="Digite seu CEP" style={styles.inputText}/>
            </View>
          </View>
          

          <View style={styles.formCont}>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Inserir Currículo Vitae:</Text>
              <TouchableOpacity style={styles.button}>
                <Text style={[styles.DMSansBold, styles.buttonText]}>Anexar CV</Text>
              </TouchableOpacity>
          </View>
        </View>
      </ScrollView>

      <StatusBar backgroundColor="white" barStyle="dark-content" />
    </SafeAreaView>
  );
}
