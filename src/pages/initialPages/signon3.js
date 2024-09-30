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
import * as ImagePicker from "expo-image-picker";
import ApisUrls from "../../ApisUrls/apisurls.js";
import { storage } from './firebase.js';
import { ref, uploadBytes, getDownloadURL } from "firebase/storage";

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
  const { apiEmuladorCad } = ApisUrls;

  const [selectedImage, setSelectedImage] = useState(null);
  const [imgURL, setImgURL] = useState(null);

  const pickImage = async () => {
    const permissionResult = await ImagePicker.requestMediaLibraryPermissionsAsync();

    if (!permissionResult.granted) {
      Alert.alert("Erro", "Permissão para acessar as imagens foi negada!");
      return;
    }

    const result = await ImagePicker.launchImageLibraryAsync({
      mediaTypes: ImagePicker.MediaTypeOptions.Images,
      allowsEditing: true,
      aspect: [1, 1],
      quality: 1,
    });

    if (!result.canceled) {
      setSelectedImage(result.assets[0].uri);
    }
  };

  // Função para formatar a data para o formato ISO
  function formatDateToISO(dateString) {
    const [day, month, year] = dateString.split("/");
    return `${year}-${month}-${day}`;
  }

  async function cadastroUser() {
    
    if (!nome || !userName || !email || !senha || !nasc || !cep || !tel || !bio) {
      Alert.alert("Erro", "Por favor, preencha todos os campos obrigatórios.");
      return;
    }

    const uploadImageToFirebase = async (uri) => {
      const response = await fetch(uri);
      const blob = await response.blob();
      
      const filename = `profile_images/${Date.now()}.jpg`;
      const imageRef = ref(storage, filename);
  
      await uploadBytes(imageRef, blob);
      const downloadURL = await getDownloadURL(imageRef);
      setImgURL(downloadURL); // Armazena a URL antes de retornar
      return downloadURL; // Retorna a URL da imagem
    };

    console.log(imgURL)

    try {
      const formattedDate = formatDateToISO(nasc);
      const dataToSend = {};

      const photoURL = selectedImage ? await uploadImageToFirebase(selectedImage) : null;

      // Adicionando os campos ao objeto
      dataToSend.nomeUsuario = nome;
      dataToSend.usernameUsuario = userName;
      dataToSend.nascUsuario = formattedDate;
      dataToSend.emailUsuario = email;
      dataToSend.senhaUsuario = senha;
      dataToSend.areaInteresseUsuario = areaInt;
      dataToSend.contatoUsuario = tel;
      dataToSend.fotoUsuario = imgURL || ""; // Use a URL da imagem ou uma string vazia
      dataToSend.cidadeUsuario = "sp";
      dataToSend.estadoUsuario = "sp";
      dataToSend.logradouroUsuario = "logradouro";
      dataToSend.cepUsuario = cep;
      dataToSend.numeroLograUsuario = "515";
      dataToSend.sobreUsuario = bio;
      dataToSend.formacaoCompetenciaUsuario = "formacao";
      dataToSend.dataFormacaoCompetenciaUsuario = "2012-12-12";

      console.log("Data to send:", dataToSend); // Log para depuração

      const response = await fetch(apiEmuladorCad, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(dataToSend),
      });

      const textResponse = await response.text(); // Mudado para text()
      console.log("Response text:", textResponse);

      let resp = textResponse;

      try {
        resp = JSON.parse(textResponse);
      } catch (error) {
        console.error("Erro ao analisar JSON:", error);
        Alert.alert("Erro", "Resposta do servidor não é um JSON válido.");
        return;
      }

      if (response.ok) {
        setUserId(resp.idUsuario);

        // Depois, exiba o alerta e navegue
        Alert.alert("Sucesso", "Usuário cadastrado com sucesso!", [
          {
            text: "OK",
            onPress: () => navigation.navigate("TabBar"),
          },
        ]);
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

          <TouchableOpacity onPress={pickImage} style={[stylesProfile.profileIconBox]}>
            <Image
              source={selectedImage ? { uri: selectedImage } : require("../../../assets/icons/manicon.png")}
              style={{ width: 100, height: 100, borderRadius: 50 }}
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
            value={bio}
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
          disabled={!nome || !userName || !email || !senha || !nasc || !cep || !tel || !bio}
        >
          <Text style={[styles.DMSansRegular, styles.nextText]}>Cadastrar</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#20dd77" barStyle="dark-content" />
    </SafeAreaView>
  );
}
