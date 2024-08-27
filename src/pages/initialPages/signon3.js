import React from "react";
import {
  View,
  Text,
  StatusBar,
  TextInput,
  SafeAreaView,
  ActivityIndicator,
  TouchableOpacity,
  Image,
} from "react-native";

import styles from "./styles/signon.js";
import stylesProfile from "../../styles/profile.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";
import FontAwesome6 from "@expo/vector-icons/FontAwesome6";

import useFonts from "../../styles/fontloader/fontloader.js";
import { useContext, useState } from "react";
import { Context } from "./context/provider.js";

export default function SignON3({ navigation }) {
  const { nome, setNome, userName, setUserName } = useContext(Context);
  const [passwordVisible, setPasswordVisible] = useState(false);

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
        <TouchableOpacity onPress={() => navigation.navigate("Welcome")}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#1b1b1b" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title]}>Cadastro</Text>
      </View>

      <View style={styles.mainContainer}>
        <View style={[styles.formCont, styles.row]}>
          <View>
            <Text style={[styles.DMSansRegular, styles.formTitle]}>
              Foto de Perfil:
            </Text>
            <Text style={styles.DMSansRegular}>
              Selecione uma foto de Perfil:{" "}
            </Text>
          </View>
          <View style={stylesProfile.profileIconBox}>
            <Image
              source={require("../../../assets/icons/manicon.png")}
              style={stylesProfile.icon}
            />
          </View>
        </View>

        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Biografia:</Text>

          <TextInput
            placeholder="Escreva uma breve biografia sobre você"
            style={[styles.bioCont, styles.DMSansRegular]}
            multiline={true}
          ></TextInput>
        </View>

        <View style={[styles.pdfCvCont, styles.row]}>
          <View style={styles.gap}>
            <View>
              <Text style={[styles.DMSansRegular, styles.formTitle]}>
                Anexar Currículo Vitae:
              </Text>
              <Text style={[styles.DMSansRegular, styles.pdfDesc]}>
                OBS: os arquivos devem estar{"\n"}no formato PDF{" "}
              </Text>
            </View>

            <TouchableOpacity style={styles.button}>
              <Text style={[styles.DMSansBold, styles.buttonText]}>
                Selecionar Arquivo
              </Text>
            </TouchableOpacity>
          </View>

          <View style={{alignSelf: 'flex-end'}}>
            <Text style={styles.DMSansRegular}>Arquivo Selecionado:</Text>
            <Text style={styles.DMSansRegular}>cv.pdf</Text>
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
