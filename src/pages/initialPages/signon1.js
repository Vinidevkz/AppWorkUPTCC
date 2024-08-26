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

import styles from "./styles/signon1.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from '@expo/vector-icons/AntDesign';
import FontAwesome6 from "@expo/vector-icons/FontAwesome6";

import useFonts from "../../styles/fontloader/fontloader.js";
import { useContext, useState } from "react";
import { Context } from "./context/provider.js";

import { NavigationContainer } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";



const Stack = createNativeStackNavigator()


export default function SignON1({navigation}) {
  const {nome, setNome, setUserName} = useContext(Context);
  const [passwordVisible, setPasswordVisible] = useState(false)
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
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#20dd77" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title]}>Cadastro</Text>
      </View>

      <View style={styles.mainContainer}>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansBold, styles.title]}>Nome:</Text>
          <TextInput placeholder="Digite seu nome" style={[styles.DMSansRegular, styles.inputCont]}/>
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansBold, styles.title]}>Nome de usuário:</Text>
          <TextInput placeholder="Digite seu nome de usuário" style={[styles.DMSansRegular, styles.inputCont]}/>
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansBold, styles.title]}>Email:</Text>
          <TextInput placeholder="Digite seu melhor email" style={[styles.DMSansRegular, styles.inputCont]}/>
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansBold, styles.title]}>Senha:</Text>
          <View style={styles.inputCont}>
          <TextInput placeholder="Crie uma senha" style={[styles.DMSansRegular, styles.inputText]} secureTextEntry={!passwordVisible}/>
          <TouchableOpacity onPress={() => setPasswordVisible(!passwordVisible)}>
            <FontAwesome6
                name={passwordVisible ? "eye-slash" : "eye"}
                size={20}
                color={"#1b1b1b"}
                style={{paddingHorizontal: 10
                }}
              />
          </TouchableOpacity>
          </View>
        </View>
      </View>

      <View style={styles.footerCont}>
        <TouchableOpacity style={styles.nextButton} onPress={() => navigation.navigate('Cadastre-se 2')}>
          <Text style={[styles.DMSansRegular, styles.footerText]}>Próximo</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="white" barStyle="dark-content" />
    </SafeAreaView>
  );
}


