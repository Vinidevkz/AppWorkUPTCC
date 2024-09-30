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
  Alert,
} from "react-native";
import styles from "./styles/signon";
import stylesProfile from "./styles/profileIcon.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";
import useFonts from "../../styles/fontloader/fontloader";
import { Context } from "./context/provider";
import * as ImagePicker from "expo-image-picker"; // Importa o Image Picker
import ApisUrls from "../../ApisUrls/apisurls.js";

export default function SignON3({ navigation }) {
  const {
    nome,
    setBio,
    bio,
    email,
    senha,
    areaInt,
    nasc,
    cep,
    tel,
    userName,
    setUserId,
  } = useContext(Context);
  const { apiNgrokCad } = ApisUrls;

  const [passwordVisible, setPasswordVisible] = useState(false);
  const [selectedImage, setSelectedImage] = useState(null); // Estado para armazenar a imagem selecionada

  // Função para formatar a data para o formato ISO
  function formatDateToISO(dateString) {
    const [day, month, year] = dateString.split("/");
    return `${year}-${month}-${day}`;
  }

  // Função para abrir o seletor de imagens
  const pickImage = async () => {
    // Pedir permissão para acessar a galeria
    const permissionResult =
      await ImagePicker.requestMediaLibraryPermissionsAsync();

    if (!permissionResult.granted) {
      Alert.alert("Erro", "Permissão para acessar as imagens foi negada!");
      return;
    }

    // Abrir o seletor de imagens
    const result = await ImagePicker.launchImageLibraryAsync({
      mediaTypes: ImagePicker.MediaTypeOptions.Images,
      allowsEditing: true, // Permite o corte da imagem
      aspect: [1, 1], // Mantém o aspecto quadrado
      quality: 1,
    });

    if (!result.canceled) {
      setSelectedImage(result.assets[0].uri); // Armazena o URI da imagem selecionada
    }
  };

  // Função para lidar com o cadastro de usuário
  async function cadastroUser() {
    if (!nome || !userName || !email || !senha || !nasc || !cep || !tel || !bio) {
      Alert.alert("Erro", "Por favor, preencha todos os campos obrigatórios.");
      return;
    }
  
    try {
      const formattedDate = formatDateToISO(nasc);
      const formData = new FormData(); // Usando FormData
      const dataToSend = {}; // Objeto para armazenar os dados
  
      // Adicionando os campos ao FormData e ao objeto
      dataToSend.nomeUsuario = nome;
      dataToSend.usernameUsuario = userName;
      dataToSend.nascUsuario = formattedDate;
      dataToSend.emailUsuario = email;
      dataToSend.senhaUsuario = senha;
      dataToSend.areaInteresseUsuario = areaInt;
      dataToSend.contatoUsuario = tel;
      dataToSend.fotoUsuario = {
        uri: selectedImage, // URI da imagem selecionada
        name: "photo.jpg", // Nome do arquivo
        type: "image/jpeg", // Tipo da imagem
      };
      dataToSend.cidadeUsuario = "sp";
      dataToSend.estadoUsuario = "sp";
      dataToSend.logradouroUsuario = "logradouro";
      dataToSend.cepUsuario = cep;
      dataToSend.numeroLograUsuario = "515";
      dataToSend.sobreUsuario = bio;
      dataToSend.formacaoCompetenciaUsuario = "formacao";
      dataToSend.dataFormacaoCompetenciaUsuario = "2012-12-12";
  
      // Log para inspecionar os dados que serão enviados
      console.log("Dados a serem enviados:", dataToSend);
  
      // Preenchendo o FormData
      for (const [key, value] of Object.entries(dataToSend)) {
        formData.append(key, value);
      }
  
      const response = await fetch(apiNgrokCad, {
        method: "POST",
        body: formData, // Enviando FormData
        headers: {
          Accept: "application/json",
        },
      });
  
      const resp = await response.json();
      console.log("Response object:", response);
      console.log("Response body:", resp);
  
      if (response.ok) {
        setUserId(resp.id);
        Alert.alert("Sucesso", "Usuário cadastrado com sucesso!");
        navigation.navigate("TabBar");
      } else {
        console.error("Erro 500:", resp);
        Alert.alert(
          "Erro",
          `Erro ao cadastrar usuário: ${resp.message || "Verifique o console para mais detalhes."}`
        );
      }
    } catch (error) {
      console.error("Error during user registration:", error);
      Alert.alert("Erro", "Erro ao cadastrar usuário. Verifique o console para mais detalhes.");
    }
  }
  
  

  // Carregar as fontes
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
        <TouchableOpacity onPress={() => navigation.navigate("Welcome")}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#1b1b1b" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title]}>Cadastro</Text>
      </View>

      <View style={styles.mainContainer}>
        <View style={[styles.formCont, styles.row]}>
          <View>
            <Text style={[styles.DMSansRegular, styles.formTitle]}>Foto de Perfil:</Text>
            <Text style={styles.DMSansRegular}>Selecione uma foto de perfil:</Text>
          </View>

          {/* Caixa de seleção de imagem */}
          <TouchableOpacity onPress={pickImage} style={[stylesProfile.profileIconBox]}>
            <Image
              source={selectedImage ? { uri: selectedImage } : require("../../../assets/icons/manicon.png")} // Mostra a imagem selecionada
              style={{ width: 100, height: 100, borderRadius: 50 }} // Define largura e altura fixas para a imagem
            />
          </TouchableOpacity>
        </View>

        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Biografia:</Text>
          <TextInput
            placeholder="Escreva uma breve biografia sobre você"
            style={styles.bioCont}
            multiline={true}
            onChangeText={(text) => setBio(text)}
            value={bio} // Certifique-se de que o valor esteja controlado
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
          disabled={!nome || !userName || !email || !senha || !nasc || !cep || !tel || !bio} // Desabilita se houver campos obrigatórios vazios
        >
          <Text style={[styles.DMSansRegular, styles.nextText]}>Cadastrar</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#20dd77" barStyle="dark-content" />
    </SafeAreaView>
  );
}
