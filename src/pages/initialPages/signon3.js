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
    linguaEstrangeira,
    ensinoMedio,
    anoFormacao,
    nasc,
    cep,
    tel,
    emailContato,
    userName,
    formacaoUsuario,
    setUserId,
  } = useContext(Context);
  const { apiNgrokCad, apiEmuladorCad } = ApisUrls;

  const [selectedImage, setSelectedImage] = useState(null);
  const [selectedBannerImage, setSelectedBannerImage] = useState(null);
  const [loading, setLoading] = useState(false); // Estado para loading
  const [dadosCep, setDadosCep] = useState(null)



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

  const pickBannerImage = async () => {
    const permissionResult = await ImagePicker.requestMediaLibraryPermissionsAsync();

    if (!permissionResult.granted) {
      Alert.alert("Erro", "Permissão para acessar as imagens foi negada!");
      return;
    }

    const result = await ImagePicker.launchImageLibraryAsync({
      mediaTypes: ImagePicker.MediaTypeOptions.Images,
      allowsEditing: true,
      aspect: [16, 9],
      quality: 1,
    });

    if (!result.canceled) {
      setSelectedBannerImage(result.assets[0].uri);
    }
  };

  async function pegarCEP() {
    try {
      const request = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
      const response = await request.json();
      
      if (response.erro) {
        throw new Error("CEP não encontrado.");
      }
      
      setDadosCep(response);
      return response; // Retorna a resposta para verificar na função cadastroUser
    } catch (erro) {
      console.log("Erro ao buscar CEP:", erro);
      Alert.alert("Erro", "CEP não encontrado. Verifique o valor do CEP.");
    }
  }
  
  async function cadastroUser() {
    if (!nome || !userName || !email || !senha || !nasc || !cep || !tel || !emailContato || !bio) {
      Alert.alert("Erro", "Por favor, preencha todos os campos obrigatórios.");
      return;
    }
  
    setLoading(true);
  
    const uploadImageToFirebase = async (uri) => {
      const response = await fetch(uri);
      const blob = await response.blob();
      const filename = `profile_images/${Date.now()}.jpg`;
      const imageRef = ref(storage, filename);
      await uploadBytes(imageRef, blob);
      const downloadURL = await getDownloadURL(imageRef);
      return downloadURL;
    };
  
    try {
      // Chama pegarCEP e espera o retorno para verificar os dados do CEP
      const cepData = await pegarCEP();
      
      if (!cepData) {
        setLoading(false);
        return; // Sai da função se o CEP for inválido ou não encontrado
      }
  
      const formattedDate = formatDateToISO(nasc);
      const dataToSend = {};
  
      const photoURL = selectedImage ? await uploadImageToFirebase(selectedImage) : null;
      const bannerImageURL = selectedBannerImage ? await uploadImageToFirebase(selectedBannerImage) : null;
  
      // Utiliza o cepData para garantir que os valores existem
      dataToSend.nomeUsuario = nome;
      dataToSend.usernameUsuario = userName;
      dataToSend.nascUsuario = formattedDate;
      dataToSend.emailUsuario = email;
      dataToSend.senhaUsuario = senha;
      dataToSend.contatoUsuario = tel;
      dataToSend.emailContato = emailContato;
      dataToSend.areaInteresseUsuario = areaInt;
      dataToSend.linguaEstrangeira = linguaEstrangeira;
      dataToSend.ensinoMedio = ensinoMedio;
      dataToSend.anoFormacao = anoFormacao;
      dataToSend.fotoUsuario = photoURL || "";
      dataToSend.fotoBanner = bannerImageURL || "";
      dataToSend.cidadeUsuario = cepData.localidade || "";
      dataToSend.estadoUsuario = cepData.uf || "";
      dataToSend.logradouroUsuario = cepData.logradouro || "Não encontrado";
      dataToSend.cepUsuario = cep;
      dataToSend.numeroLograUsuario = cepData.ddd || "";
      dataToSend.sobreUsuario = bio;
      dataToSend.formacaoCompetenciaUsuario = formacaoUsuario;
      dataToSend.dataFormacaoCompetenciaUsuario = "2012-12-12";
  
      console.log("Dados enviados para o backend:", JSON.stringify(dataToSend, null, 2));
  
      const response = await fetch(apiNgrokCad, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(dataToSend),
      });
  
      const textResponse = await response.text();
      let resp;
  
      try {
        resp = JSON.parse(textResponse);
      } catch (error) {
        Alert.alert("Erro", "Resposta do servidor não é um JSON válido.");
        return;
      }
  
      if (!response.ok) {
        console.log("Resposta do servidor:", textResponse);
        let errorMessage = 'Erro ao cadastrar usuário.';
        if (resp.errors) {
          errorMessage = Object.values(resp.errors).map(errArray => errArray.join(' ')).join('\n');
        } else if (resp.message) {
          errorMessage = resp.message;
        }
        Alert.alert("Erro", errorMessage);
      } else {
        setUserId(resp.idUsuario);
        navigation.navigate('TabBar');
      }
      
    } catch (error) {
      Alert.alert("Erro", "Erro ao cadastrar usuário. Verifique o console para mais detalhes.");
      console.log(error);
    } finally {
      setLoading(false);
    }
  }

  const fontsLoaded = useFonts();
  if (!fontsLoaded) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }

  return (
    <SafeAreaView >
      <StatusBar backgroundColor="#fff" barStyle="dark-content" />
      {loading && (
        <View style={{ 
          position: "absolute", 
          top: 0, 
          left: 0, 
          right: 0, 
          bottom: 0, 
          backgroundColor: "rgba(0, 0, 0, 0.5)", 
          justifyContent: "center", 
          alignItems: "center",
          zIndex: 1000,
        }}>
          <ActivityIndicator size="large" color="#20dd77" />
        </View>
      )}

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
              source={selectedImage ? { uri: selectedImage } : require("../../../assets/icons/manicon.jpg")}
              style={{ width: 100, height: 100, borderRadius: 50 }}
            />
          </TouchableOpacity>
        </View>

        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Banner:</Text>
          <Text style={styles.DMSansRegular}>Selecione um banner:</Text>
          <TouchableOpacity onPress={pickBannerImage}>
            <Image
              source={selectedBannerImage ? { uri: selectedBannerImage } : require("../../../assets/icons/profilebgempty.png")}
              style={{ width: '100%', height: 150, borderRadius: 10 }}
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
        <TouchableOpacity style={[styles.confirmButton, {borderWidth: 2, borderColor: '#20dd77', borderRadius: 20, padding: 5, marginRight: 10}]} onPress={cadastroUser}>
          <Text style={[styles.DMSansRegular, styles.footerText]}>Finalizar Cadastro</Text>
        </TouchableOpacity>
      </View>
    </SafeAreaView>
  );
}

const formatDateToISO = (date) => {
  const [day, month, year] = date.split("/");
  return `${year}-${month}-${day}`;
};
