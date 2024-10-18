import React, { useContext, useState, useEffect } from "react";
import {
  View,
  Text,
  StatusBar,
  SafeAreaView,
  ActivityIndicator,
  TouchableOpacity,
} from "react-native";
import { Picker } from "@react-native-picker/picker";

import styles from "./styles/signon.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";
import FontAwesome from '@expo/vector-icons/FontAwesome';

import useFonts from "../../styles/fontloader/fontloader.js";
import { Context } from "./context/provider.js";

import ApisUrls from '../../ApisUrls/apisurls.js'

export default function SignON4({ navigation }) {
  const { areaInt, setAreaInt, setTel, setNasc, setCep } = useContext(Context);
  const [areaVagas, setAreaVagas] = useState([]);
  const [areaInteresseUsuario, setAreaInteresseUsuario] = useState('');

  const [toggleNo, setToggleNo] = useState(true);
  const [toggleYes, setToggleYes] = useState(false);
  
  const { apiEmuladorArea } = ApisUrls;

  useEffect(() => {
    async function pegarAreaVaga() {
      try {
        const request = await fetch(apiEmuladorArea);
        const response = await request.json();
        setAreaVagas(response);
      } catch (error) {
        console.error("Erro ao buscar áreas de vagas:", error);
      }
    }

    pegarAreaVaga();
  }, []);

  // Carregador de fontes
  const fontsLoaded = useFonts();

  if (!fontsLoaded) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }

  const handleToggleNo = () => {
    setToggleNo(true);
    setToggleYes(false);
  };

  const handleToggleYes = () => {
    setToggleNo(false);
    setToggleYes(true);
  };

  return (
    <SafeAreaView>
      <View style={styles.header}>
        <TouchableOpacity onPress={() => navigation.navigate("Welcome")}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#1b1b1b" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title]}>Cadastro</Text>
      </View>

      <View style={styles.mainContainer}>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Possui alguma língua estrangeira?:
          </Text>

          <View style={{ marginTop: 15, flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between' }}>
            <View style={{ flexDirection: 'row', alignItems: 'center', gap: 10 }}>
              <TouchableOpacity onPress={handleToggleNo}>
                <FontAwesome name={toggleNo ? "circle" : "circle-o"} size={35} color="#20dd77" />
              </TouchableOpacity>
              <Text style={styles.DMSansRegular}>Não</Text>
            </View>

            <View style={{ flexDirection: 'row', alignItems: 'center', gap: 10 }}>
              <TouchableOpacity onPress={handleToggleYes}>
                <FontAwesome name={toggleYes ? "circle" : "circle-o"} size={35} color="#20dd77" />
              </TouchableOpacity>
              <Text style={styles.DMSansRegular}>Sim</Text>
            </View>
          </View>


        </View>
      </View>

      <View style={styles.footerCont}>
        <TouchableOpacity
          style={styles.backButton}
          onPress={() => navigation.goBack()}
        >
          <AntDesign name="left" size={24} color="black" />
          <Text style={[styles.DMSansRegular, styles.footerText]}>Voltar</Text>
        </TouchableOpacity>
        <TouchableOpacity
          style={styles.nextButton}
          onPress={() => navigation.navigate("SignON3")}
        >
          <Text style={[styles.DMSansRegular, styles.nextText]}>Próximo</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#20dd77" barStyle="dark-content" />
    </SafeAreaView>
  );
}
