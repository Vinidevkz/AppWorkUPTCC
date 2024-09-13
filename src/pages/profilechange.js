import React, { useEffect, useState, useContext } from "react";
import {
  View,
  Text,
  SafeAreaView,
  ScrollView,
  TextInput,
  TouchableOpacity,
} from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { Context } from "../pages/initialPages/context/provider.js";
import { Picker } from "@react-native-picker/picker";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from '@expo/vector-icons/AntDesign';
import styles from "../styles/profilechange.js";

export default function ProfileChange({ navigation }) {
  const { theme } = useTheme();
  const { userId } = useContext(Context);
  const [areaVagas, setAreaVagas] = useState([]);
  const [dadosUser, setDadosUser] = useState({});
  const [areaInteresseUsuario, setAreaInteresseUsuario] = useState("");

  const apiEmulador = "http://10.0.2.2:8000/api/usuario/";
  const apiEmuladorAreas = "http://10.0.2.2:8000/api/areavaga";

  useEffect(() => {
    async function fetchUserData() {
      const apiUrl = `${apiEmulador}${userId}`;
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
        const response = await fetch(apiEmuladorAreas);
        const data = await response.json();
        console.log("Fetched areas:", data);
        setAreaVagas(data);
      } catch (error) {
        console.error("Erro ao buscar áreas de vagas:", error);
      }
    }

    pegarAreaVaga();
  }, []);

  return (
    <SafeAreaView
      style={{ height: '100%', backgroundColor: theme.backgroundColor }}
    >
      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar },
        ]}
      >
        <View style={{alignItems: 'center', flexDirection: 'row', gap: 20}}>
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
            Alterar Perfil
          </Text>
        </View>

        <TouchableOpacity style={styles.button}>
          <Text style={[styles.DMSansBold, styles.saveText]}>Salvar</Text>
          <AntDesign name="plus" size={15} color="#20dd77" />
        </TouchableOpacity>

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
            value={dadosUser.nomeUsuario || ""}
          />
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
            value={dadosUser.usernameUsuario || ""}
          />
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
            value={dadosUser.sobreUsuario || ""}
          />
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
            style={[
              styles.inputCont,
              styles.text,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
            onValueChange={(itemValue) => {
              setAreaInteresseUsuario(itemValue);
            }}
            mode="dropdown"
          >
            <Picker.Item label="Selecione uma área" value="" />
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
            value={dadosUser.formacaoCompetenciaUsuario || ""}
          />
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
              Telefone:
            </Text>
            <TextInput
              style={[
                styles.contactInput,
                styles.DMSansRegular,
                { color: theme.textColor },
              ]}
              value={dadosUser.contatoUsuario || ""}
            />
          </View>
          <View style={styles.contactCont}>
            <Text
              style={[
                styles.DMSansRegular,
                { color: theme.textColor, fontSize: 16 },
              ]}
            >
              Rede 1:
            </Text>
            <TextInput
              style={[
                styles.contactInput,
                styles.DMSansRegular,
                { color: theme.textColor },
              ]}
              value={dadosUser.contatoUsuario || ""}
            />
          </View>
          <View style={styles.contactCont}>
            <Text
              style={[
                styles.DMSansRegular,
                { color: theme.textColor, fontSize: 16 },
              ]}
            >
              Rede 2:
            </Text>
            <TextInput
              style={[
                styles.contactInput,
                styles.DMSansRegular,
                { color: theme.textColor },
              ]}
              value={dadosUser.contatoUsuario || ""}
            />
          </View>
        </View>


      </ScrollView>
    </SafeAreaView>
  );
}
