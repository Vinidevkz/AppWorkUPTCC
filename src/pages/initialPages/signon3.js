import React, { useContext, useState } from "react";
import {
  View,
  Text,
  StatusBar,
  TextInput,
  SafeAreaView,
  ActivityIndicator,
  TouchableOpacity,
  Image,
  Alert
} from "react-native";
import styles from "./styles/signon";
import stylesProfile from "../../styles/profile";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from '@expo/vector-icons/AntDesign';
import useFonts from "../../styles/fontloader/fontloader";
import { Context } from "./context/provider";

export default function SignON3({ navigation }) {
  const {
    nome, setBio, bio, email, senha, nasc, cep, tel, userName, setUserId
  } = useContext(Context);
  
  const [passwordVisible, setPasswordVisible] = useState(false);

  // Function to format the date to ISO format
  function formatDateToISO(dateString) {
    const [day, month, year] = dateString.split('/');
    return `${year}-${month}-${day}`;
  }

  // Function to handle user registration
  async function cadastroUser() {
    // Validation for required fields
    if (!nome || !userName || !email || !senha || !nasc || !cep || !tel || !bio) {
      Alert.alert('Erro', 'Por favor, preencha todos os campos obrigatórios.');
      return;
    }

    try {
      const formattedDate = formatDateToISO(nasc);
      const response = await fetch('https://f602-200-53-198-146.ngrok-free.app/api/usuario', {
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
          numeroLograUsuario: "515",
          sobreUsuario: bio,
          formacaoCompetenciaUsuario: "formacao",
          dataFormacaoCompetenciaUsuario: "2012-12-12"
        })
      });

      const resp = await response.json();

      if (response.ok) {
        setUserId(resp.id);
        Alert.alert('Sucesso', 'Usuário cadastrado com sucesso!');
        navigation.navigate('TabBar');
      } else {
        Alert.alert('Erro', `Erro ao cadastrar usuário: ${resp.message || 'Verifique o console para mais detalhes.'}`);
      }
    } catch (error) {
      Alert.alert('Erro', 'Erro ao cadastrar usuário. Verifique o console para mais detalhes.');
      console.error("Error during user registration:", error);
    }
  }

  // Font loading
  const fontsLoaded = useFonts();
  if (!fontsLoaded) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }

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
          <TextInput
            placeholder="Escreva uma breve biografia sobre você"
            style={styles.bioCont}
            multiline={true}
            onChangeText={(text) => setBio(text)}
            value={bio} // Ensure the value is controlled
          />
        </View>
      </View>

      <View style={styles.footerCont}>
        <TouchableOpacity style={styles.backButton} onPress={() => navigation.goBack()}>
          <AntDesign name="left" size={24} color="black" />
          <Text style={[styles.DMSansRegular, styles.footerText]}>Voltar</Text>
        </TouchableOpacity>
        <TouchableOpacity
          style={[styles.nextButton, { opacity: !nome || !userName || !email || !senha || !nasc || !cep || !tel || !bio ? 0.5 : 1 }]}
          onPress={cadastroUser}
          disabled={!nome || !userName || !email || !senha || !nasc || !cep || !tel || !bio} // Disable if any required field is empty
        >
          <Text style={[styles.DMSansRegular, styles.nextText]}>Cadastrar</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#20dd77" barStyle="dark-content" />
    </SafeAreaView>
  );
}
