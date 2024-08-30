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
import { TextInputMask } from 'react-native-masked-text';

import styles from "./styles/signon.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from '@expo/vector-icons/AntDesign';
import FontAwesome6 from "@expo/vector-icons/FontAwesome6";

import useFonts from "../../styles/fontloader/fontloader.js";
import { useContext, useState } from "react";
import { Context } from "./context/provider.js";


export default function SignON2({navigation}) {
  const {setTel, setNasc, setCep} = useContext(Context);

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
        <TouchableOpacity onPress={() => navigation.navigate('Welcome')}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#1b1b1b" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title]}>Cadastro</Text>
      </View>

      <View style={styles.mainContainer}>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Áreas de Interesse:</Text>
          <TextInput placeholder="Selecione até três áreas de seu interesse" style={[styles.DMSansRegular, styles.inputCont]}/>
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Telefone:</Text>
          <TextInputMask
          type={'cel-phone'}
          options={{
            maskType: 'BRL',
            withDDD: true,
            dddMask: '(99) '
          }}
          placeholder="(99) 99999-9999"
          style={[styles.DMSansRegular, styles.inputCont]}
          onChangeText={(text)=>setTel(text)}
        />
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Data de Nascimento:</Text>
          <TextInputMask
          type={'datetime'}
          options={{
            format: 'DD/MM/YYYY'
          }}
          placeholder="DD/MM/AAAA"
          style={[styles.DMSansRegular, styles.inputCont]}
          onChangeText={text => setNasc(text)}
        />
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>CEP:</Text>
          <TextInputMask
          type={'zip-code'}
          placeholder="Digite seu CEP"
          style={[styles.DMSansRegular, styles.inputCont]}
          onChangeText={text => setCep(text)}
        />

        </View>

      </View>

      <View style={styles.footerCont}>
      <TouchableOpacity style={styles.backButton} onPress={() => navigation.goBack()}>
      <AntDesign name="left" size={24} color="black" />
          <Text style={[styles.DMSansRegular, styles.footerText]}>Voltar</Text>

        </TouchableOpacity>
        <TouchableOpacity style={styles.nextButton} onPress={() => navigation.navigate('SignON3')}>
          <Text style={[styles.DMSansRegular, styles.nextText]}>Próximo</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#20dd77" barStyle="dark-content" />
    </SafeAreaView>
  );
}
