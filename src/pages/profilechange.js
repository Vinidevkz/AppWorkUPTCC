import React from "react";
import {
  View,
  Text,
  SafeAreaView,
  ScrollView,
  TextInput,
  TouchableOpacity,
} from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { useContext, useEffect, useState } from "react";
import { Context } from "../pages/initialPages/context/provider.js";
import { Picker } from "@react-native-picker/picker";
import Ionicons from "@expo/vector-icons/Ionicons";
import styles from "../styles/profilechange.js";

export default function ProfileChange({ navigation }) {
  const { theme, toggleTheme } = useTheme();
  const { userId } = useContext(Context);
  const [areaVagas, setAreaVagas] = useState([]);
  const [dadosUser, setDadosUser] = useState([]);
  const [areaInteresseUsuario, setAreaInteresseUsuario] = useState("");

  //URLs para cada emulação
  const apiNgrok = "https://165e-200-53-197-8.ngrok-free.app/api/usuario/";
  const apiNgrokAreas = "https://165e-200-53-197-8.ngrok-free.app/api/areavaga";

  useEffect(() => {
    async function fetchUserData() {
      const apiUrl = `${apiNgrok}${userId}`;
      try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        setDadosUser(data);
        console.log("Fetched user data:", data);
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    }

    if (userId) {
      fetchUserData();
    }
  }, [userId]);

  useEffect(() => {
    async function pegarAreaVaga() {
      try {
        const request = await fetch(apiNgrokAreas);
        const response = await request.json();
        console.log("Fetched areas:", response);
        setAreaVagas(response);
      } catch (error) {
        console.error("Erro ao buscar áreas de vagas:", error);
      }
    }

    pegarAreaVaga();
  }, []);

  return (
    <SafeAreaView
      style={{ paddingBottom: 80, backgroundColor: theme.backgroundColor }}
    >
      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar },
        ]}
      >
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons
            name="caret-back-circle-sharp"
            size={35}
            color={theme.iconColorWhite}
          />
        </TouchableOpacity>
        <Text
          style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}
        >
          Alterar Perfil:
        </Text>
      </View>
      <ScrollView
        style={{
          height: "100%",
          padding: 20,
          backgroundColor: theme.backgroundColor,
        }}
      >
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: "DMSans-Regular",
              fontSize: 18,
            }}
          >
            Nome:
          </Text>
          <TextInput
            style={[
              styles.textInput,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
          >
            {dadosUser.nomeUsuario}
          </TextInput>
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: "DMSans-Regular",
              fontSize: 18,
            }}
          >
            Nome de usuário:
          </Text>
          <TextInput
            style={[
              styles.textInput,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
          >
            {dadosUser.usernameUsuario}
          </TextInput>
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: "DMSans-Regular",
              fontSize: 18,
            }}
          >
            Biografia:
          </Text>
          <TextInput
            style={[
              styles.textInput,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
          >
            {dadosUser.sobreUsuario}
          </TextInput>
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: "DMSans-Regular",
              fontSize: 18,
            }}
          >
            Área de Interesse:
          </Text>
          <Picker
            selectedValue={areaInteresseUsuario}
            style={[styles.inputCont, styles.text, styles.DMSansRegular, {color: theme.textColor}]}
            onValueChange={(itemValue) => {
              setAreaInteresseUsuario(itemValue); // Atualiza o estado com o valor selecionado
            }}
            mode="dropdown"
          >
            <Picker.Item label={dadosUser.areaInteresseUsuario} value="" />
            {Array.isArray(areaVagas) &&
              areaVagas.map((area, index) => (
                <Picker.Item
                  key={index}
                  label={area.nomeAreaInteresseVaga}
                  value={area.nomeAreaInteresseVaga}
                />
              ))}
          </Picker>
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: "DMSans-Regular",
              fontSize: 18,
            }}
          >
            Competência:
          </Text>
          <TextInput
            style={[
              styles.textInput,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
          >
            {dadosUser.formacaoCompetenciaUsuario}
          </TextInput>
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: "DMSans-Regular",
              fontSize: 18,
            }}
          >
            Contatos:
          </Text>
          <View style={styles.contactCont}>
            <Text
              style={[
                styles.DMSansRegular,
                { color: theme.textColor, fontSize: 16 },
              ]}
            >
              Telefone:{" "}
            </Text>
            <TextInput
              style={[
                styles.contactInput,
                styles.DMSansRegular,
                { color: theme.textColor },
              ]}
            >
              {dadosUser.contatoUsuario}
            </TextInput>
          </View>
          <View style={styles.contactCont}>
            <Text
              style={[
                styles.DMSansRegular,
                { color: theme.textColor, fontSize: 16 },
              ]}
            >
              Rede 1:{" "}
            </Text>
            <TextInput
              style={[
                styles.contactInput,
                styles.DMSansRegular,
                { color: theme.textColor },
              ]}
            >
              {dadosUser.contatoUsuario}
            </TextInput>
          </View>
          <View style={styles.contactCont}>
            <Text
              style={[
                styles.DMSansRegular,
                { color: theme.textColor, fontSize: 16 },
              ]}
            >
              Rede 2:{" "}
            </Text>
            <TextInput
              style={[
                styles.contactInput,
                styles.DMSansRegular,
                { color: theme.textColor },
              ]}
            >
              {dadosUser.contatoUsuario}
            </TextInput>
          </View>
        </View>

        <TouchableOpacity style={styles.button}>
          <Text style={[styles.DMSansBold]}>Salvar Alterações</Text>
        </TouchableOpacity>
      </ScrollView>
    </SafeAreaView>
  );
}
