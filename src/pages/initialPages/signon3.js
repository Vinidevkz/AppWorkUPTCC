import React, { useContext, useState } from "react";
import {
  View,
  Text,
  StatusBar,
  TextInput,
  SafeAreaView,
  ActivityIndicator,
  TouchableOpacity,
  Image
} from "react-native";
import styles from "./styles/signon.js";
import stylesProfile from "../../styles/profile.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from '@expo/vector-icons/AntDesign';
import FontAwesome6 from "@expo/vector-icons/FontAwesome6";
import useFonts from "../../styles/fontloader/fontloader.js";
import { Context } from "./context/provider.js";

export default function SignON3({ navigation }) {
  const { nome, setBio, bio, email, senha, nasc, cep, tel, userName, setUserId } = useContext(Context);
  const [passwordVisible, setPasswordVisible] = useState(false);

  console.log("Rendering SignON3 component");
  console.log("User details:", { nome, bio, email, nasc, cep, tel, userName });

  function formatDateToISO(dateString) {
    const [day, month, year] = dateString.split('/');
    return `${year}-${month}-${day}`;
  }

  async function cadastroUser() {
    console.log("Starting user registration");
    try {
      const formattedDate = formatDateToISO(nasc);
      const response = await fetch('http://10.0.2.2:8000/api/usuario', {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          nomeUsuario: nome,
          usernameUsuario: userName,
          nascUsuario: formattedDate,
          emailUsuario: email,
          senhaUsuario: senha,
          areaInteresseUsuario: "tecnologia",
          contatoUsuario: tel,
          fotoUsuario: "foto1",
          cidadeUsuario: "sp",
          estadoUsuario: "sp",
          logradouroUsuario: "logradouro",
          cepUsuario: cep,
          numeroLograUsuario: 515,
          sobreUsuario: bio,
          formacaoCompetenciaUsuario: "formacao",
          dataFormacaoCompetenciaUsuario: "dataFormacao"
        })
      });

      console.log("Received response from API:", response);

      const resp = await response.json();
      console.log("Parsed JSON response:", resp);

      if (response.ok) {
        console.log("User ID from API:", resp.id);
        setUserId(resp.id);
        alert('Usuário cadastrado com sucesso!');
        navigation.navigate('SignON3');
      } else {
        console.error("API returned error response:", resp);
        alert('Erro ao cadastrar usuário');
      }
    } catch (error) {
      console.error("Error during user registration:", error);
      alert('Erro ao cadastrar usuário. Verifique o console para mais detalhes.');
    }
  }


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
        <View style={[styles.formCont, styles.row]}>
          <View>
            <Text style={[styles.DMSansBold, styles.formTitle]}>Foto de Perfil:</Text>
            <Text style={styles.DMSansRegular}>Selecione uma foto de Perfil: </Text>
          </View>
          <View style={stylesProfile.profileIconBox}>
              <Image
                source={require("../../../assets/icons/manicon.png")}
                style={stylesProfile.icon}
              />
            </View>
        </View>

        <View style={styles.formCont}>
          <Text style={[styles.DMSansBold, styles.formTitle]}>Biografia:</Text>
          <TextInput placeholder="Escreva uma breve biografia sobre você" style={styles.bioCont} multiline={true}
          onChangeText={(text)=>setBio(text)}/>
        </View>
      </View>

      <View style={styles.footerCont}>
      <TouchableOpacity style={styles.backButton} onPress={() => navigation.goBack()}>
      <AntDesign name="left" size={24} color="black" />
          <Text style={[styles.DMSansRegular, styles.footerText]}>Voltar</Text>

        </TouchableOpacity>
        <TouchableOpacity style={styles.nextButton} onPress={cadastroUser }>
          <Text style={[styles.DMSansRegular, styles.nextText]}>Cadastrar</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#20dd77" barStyle="dark-content" />
    </SafeAreaView>
  );
}
