import React, { useEffect, useState, useContext } from "react";
import { View, Text, SafeAreaView, ScrollView, TextInput, TouchableOpacity, Alert, Image, ActivityIndicator } from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { Context } from "../pages/initialPages/context/provider.js";
import { Picker } from "@react-native-picker/picker";
import { TextInputMask } from "react-native-masked-text";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";
import styles from "../styles/profilechange.js";
import ApisUrls from "../ApisUrls/apisurls.js";
import { storage } from "../pages/initialPages/firebase.js";
import * as ImagePicker from "expo-image-picker";
import { ref, uploadBytes, getDownloadURL } from "firebase/storage";

import MaterialIcons from "@expo/vector-icons/MaterialIcons";

export default function ProfileChange({ navigation }) {
  const { theme } = useTheme();
  const { userId, setNome, setUserName, setBio, setAreaInt, areaInt, setNasc, nasc, setFormacaoUsuario, setTel } = useContext(Context);

  const [areaVagas, setAreaVagas] = useState([]);
  const [dadosUser, setDadosUser] = useState({});
  const [nomeUsuarioAlterado, setNomeUsuarioAlterado] = useState("");
  const [userNameAlterado, setUsernameAlterado] = useState("");
  const [sobreUsuarioAlterado, setSobreUsuarioAlterado] = useState("");
  const [nascUsuarioAlterado, setNascUsuarioAlterado] = useState("");
  const [areaIntUsuarioAlterado, setAreaIntUsuarioAlterado] = useState(areaInt);
  const [selectedImage, setSelectedImage] = useState(null);
  const [selectedBannerImage, setSelectedBannerImage] = useState(null);
  const [loading, setLoading] = useState(false);

  const [formacaoCompetenciaUsuarioAlterado, setFormacaoCompetenciaUsuarioAlterado] = useState("");
  const [telAlterado, setTelAlterado] = useState("");

  const { apiNgrokArea, apiNgrokUsuario, apiNgrokAlterar } = ApisUrls;

  useEffect(() => {
    async function fetchUserData() {
      const apiUrl = `${apiNgrokUsuario}${userId}`;
      try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        setDadosUser(data);

        // Converte a data para o formato DD/MM/YYYY
        const formattedDate = convertDateToDDMMYYYY(data.nascUsuario);

        setNomeUsuarioAlterado(data.nomeUsuario || "");
        setUsernameAlterado(data.usernameUsuario || "");
        setSobreUsuarioAlterado(data.sobreUsuario || "");
        setNascUsuarioAlterado(formattedDate || ""); // Usando a data formatada
        setAreaIntUsuarioAlterado(data.areaInt || ""); // Definindo a área de interesse atual
        setFormacaoCompetenciaUsuarioAlterado(data.formacaoCompetenciaUsuario || "");
        setTelAlterado(data.contatoUsuario || "");
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
        const response = await fetch(apiNgrokArea);
        const data = await response.json();
        setAreaVagas(data);
      } catch (error) {
        console.error("Erro ao buscar áreas de vagas:", error);
      }
    }

    pegarAreaVaga();
  }, []);

  // Função para converter data do formato YYYY-MM-DD para DD/MM/YYYY
  function convertDateToDDMMYYYY(dateString) {
    if (!dateString) return "";
    const [year, month, day] = dateString.split("-");
    return `${day}/${month}/${year}`;
  }

  function formatDateToISO(dateString) {
    if (!dateString) {
      return ""; // Retorne uma string vazia se a data não for fornecida
    }

    const [day, month, year] = dateString.split("/");

    // Verifique se todos os componentes da data estão presentes
    if (!day || !month || !year) {
      return ""; // Retorne uma string vazia ou uma data padrão se algum componente estiver ausente
    }

    // Formate a data no formato ISO esperado pelo backend
    return `${year}-${month}-${day}`;
  }

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

  const uploadImageToFirebase = async (uri) => {
    const response = await fetch(uri);
    const blob = await response.blob();
    const filename = `profile_images/${Date.now()}.jpg`;
    const imageRef = ref(storage, filename);
    await uploadBytes(imageRef, blob);
    const downloadURL = await getDownloadURL(imageRef);
    return downloadURL;
  };

  const alterarUsuario = async () => {
    setLoading(true);
    if (!nomeUsuarioAlterado.trim() || !userNameAlterado.trim() || !sobreUsuarioAlterado.trim() || !areaIntUsuarioAlterado.trim() || !nascUsuarioAlterado.trim() || !formacaoCompetenciaUsuarioAlterado.trim() || !telAlterado.trim()) {
      Alert.alert("Erro", "Por favor, preencha todos os campos obrigatórios.");
      setLoading(false);
      return;
    }

    const formattedDate = formatDateToISO(nascUsuarioAlterado);

    if (!formattedDate) {
      Alert.alert("Erro", "Data de nascimento é obrigatória.");
      setLoading(false);
      return;
    }

    let fotoUsuarioUrl = null;
    let fotoBannerUrl = null;

    if (selectedImage) {
      fotoUsuarioUrl = await uploadImageToFirebase(selectedImage, `profile_${userId}.jpg`);
    }

    if (selectedBannerImage) {
      fotoBannerUrl = await uploadImageToFirebase(selectedBannerImage, `banner_${userId}.jpg`);
    }

    const dadosParaEnviar = {
      nomeUsuario: nomeUsuarioAlterado,
      usernameUsuario: userNameAlterado,
      sobreUsuario: sobreUsuarioAlterado,
      nascUsuario: formattedDate,
      areaInteresseUsuario: areaIntUsuarioAlterado,
      formacaoCompetenciaUsuario: formacaoCompetenciaUsuarioAlterado,
      contatoUsuario: telAlterado,
      fotoUsuario: fotoUsuarioUrl, // Enviar a URL da foto de perfil
      fotoBanner: fotoBannerUrl, // Enviar a URL da foto de banner
    };

    // Log para visualizar os dados
    console.log("Dados que serão enviados:", JSON.stringify(dadosParaEnviar, null, 2));

    const apiUrl = `${apiNgrokUsuario}${userId}`;
    try {
      const response = await fetch(apiUrl, {
        method: "PUT",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(dadosParaEnviar),
      });

      const jsonResponse = await response.json();

      if (response.ok) {
        Alert.alert("Sucesso", "Dados atualizados com sucesso");
        // Atualize os valores do contexto após a atualização
        setNome(nomeUsuarioAlterado);
        setUserName(userNameAlterado);
        setBio(sobreUsuarioAlterado);
        setNasc(nascUsuarioAlterado);
        setAreaInt(areaIntUsuarioAlterado);
        setFormacaoUsuario(formacaoCompetenciaUsuarioAlterado);
        setTel(telAlterado);
      } else {
        Alert.alert("Erro", jsonResponse.message || "Erro ao atualizar dados");
        console.log(jsonResponse.message);
      }
    } catch (error) {
      Alert.alert("Erro", "Erro ao se comunicar com o servidor");
      console.error(error);
    }
    setLoading(false);
  };

  return (
    <SafeAreaView style={{ height: "100%", backgroundColor: theme.backgroundColor }}>
      {loading && (
        <View
          style={{
            position: "absolute",
            top: 0,
            left: 0,
            right: 0,
            bottom: 0,
            backgroundColor: "rgba(0, 0, 0, 0.5)",
            justifyContent: "center",
            alignItems: "center",
            zIndex: 1000,
          }}
        >
          <ActivityIndicator size="large" color="#20dd77" />
        </View>
      )}
      <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
        <View style={{ alignItems: "center", flexDirection: "row", gap: 20 }}>
          <TouchableOpacity onPress={() => navigation.goBack()}>
          <MaterialIcons name="arrow-back-ios" size={20} color={theme.textColor} />
          </TouchableOpacity>
          <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Alterar Perfil</Text>
        </View>

        <TouchableOpacity style={styles.button} onPress={alterarUsuario}>
          <Text style={[styles.DMSansBold, styles.saveText]}>Salvar</Text>  
        </TouchableOpacity>
      </View>

      <ScrollView
        style={{
          height: "100%",
          padding: 20,
          backgroundColor: theme.backgroundColor,
        }}
      >
        <Text
          style={{
            color: theme.textColor,
            fontFamily: "DMSans-Regular",
            fontSize: 18,
            paddingBottom: 10,
          }}
        >
          Fotos de perfil:
        </Text>

        <View style={[styles.profileBackgroundImageCont, { backgroundColor: theme.backgroundColor, marginBottom: 20 }]}>
          <TouchableOpacity style={{ width: "100%", height: "100%" }} onPress={pickBannerImage}>
            <Image source={selectedBannerImage ? { uri: selectedBannerImage } : dadosUser.fotoBanner ? { uri: dadosUser.fotoBanner } : require("../../assets/icons/profilebgempty.png")} style={styles.profileBackgroundImg} />
          </TouchableOpacity>

          <View
            style={{
              position: "absolute",
              bottom: -50,
              left: "50%",
              transform: [{ translateX: -50 }],
            }}
          >
            <TouchableOpacity onPress={pickImage}>
              <View style={[styles.profileIconBox, { borderColor: theme.borderColor }]}>
                <Image source={selectedImage ? { uri: selectedImage } : dadosUser.fotoUsuario ? { uri: dadosUser.fotoUsuario } : require("../../assets/icons/manicon.jpg")} style={styles.icon} />
              </View>
            </TouchableOpacity>
          </View>
        </View>

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
          <TextInput style={[styles.textInput, styles.DMSansRegular, { color: theme.textColor }]} value={nomeUsuarioAlterado} onChangeText={(text) => setNomeUsuarioAlterado(text)} />
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
          <TextInput style={[styles.textInput, styles.DMSansRegular, { color: theme.textColor }]} value={userNameAlterado} onChangeText={(text) => setUsernameAlterado(text)} />

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
          <TextInput style={[styles.textInput, styles.DMSansRegular, { color: theme.textColor }]} value={sobreUsuarioAlterado} onChangeText={(text) => setSobreUsuarioAlterado(text)} multiline={true} textAlignVertical="top" />
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: "DMSans-Regular",
              fontSize: 18,
            }}
          >
            Data de Nascimento:
          </Text>
          <TextInputMask
            type={"datetime"}
            value={nascUsuarioAlterado}
            options={{
              format: "DD/MM/YYYY", // Exibição no formato DD/MM/YYYY
            }}
            placeholder="DD/MM/YYYY"
            placeholderTextColor={"#909090"}
            style={[styles.DMSansRegular, styles.textInput, { color: theme.textColor }]}
            onChangeText={(text) => {
              console.log("Valor da data:", text); // Adicione um log para verificar o valor da data
              setNascUsuarioAlterado(text);
            }}
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
          <View style={styles.areaInput}>
          <Picker
  selectedValue={areaIntUsuarioAlterado} // Valor selecionado
  style={[
    styles.DMSansRegular,
    { color: theme.textColor },
  ]}
  onValueChange={(itemValue) => setAreaIntUsuarioAlterado(itemValue)} // Atualiza estado
  mode="dropdown"
>
  {/* Item inicial com o valor de areaInt */}
  <Picker.Item label={areaInt} value={areaInt} />
  {Array.isArray(areaVagas) &&
    areaVagas.map((area, index) => (
      <Picker.Item key={index} label={area.nomeArea} value={area.nomeArea} />
    ))}
</Picker>
          </View>


        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: "DMSans-Regular",
              fontSize: 18,
            }}
          >
            Competências:
          </Text>
          <TextInput style={[styles.textInput, styles.DMSansRegular, { color: theme.textColor }]} value={formacaoCompetenciaUsuarioAlterado} onChangeText={(text) => setFormacaoCompetenciaUsuarioAlterado(text)} />
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
            <Text style={[styles.DMSansRegular, { color: theme.textColor, fontSize: 16 }]}>Telefone:</Text>
            <TextInput style={[styles.contactInput, styles.DMSansRegular, { color: theme.textColor }]} value={telAlterado} onChangeText={(text) => setTelAlterado(text)} />
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
