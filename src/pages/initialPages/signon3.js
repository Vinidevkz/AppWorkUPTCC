import React from "react";
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
import stylesProfile from "../../styles/profile.js"
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from '@expo/vector-icons/AntDesign';
import FontAwesome6 from "@expo/vector-icons/FontAwesome6";

import useFonts from "../../styles/fontloader/fontloader.js";
import { useContext, useState } from "react";
import { Context } from "./context/provider.js";


export default function SignON3({navigation}) {
  const {nome, setBio,bio,email,senha,nasc,cep,tel,userName} = useContext(Context);
  const [passwordVisible, setPasswordVisible] = useState(false)
  console.log(nome)
  console.log(bio)
  console.log(email)
  console.log(nasc)
  console.log(cep)
  console.log(tel)
  console.log(userName)

async function cadastroUser(){
  try{
    const response = await fetch('http://127.0.0.1:8000/api/usuario',{
      method:'POST',
      headers:{
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body:JSON.stringify({
       // primeiro nome que vai pegar na Api,o segundo é oq que vc manda aqui
        nome: nome,
        email:email,
        nascimento:nasc,
        cep:cep,
        telefone:tel,
        userName:userName,
        bio:bio
  
      })
    })
  
    const resp = await response.json()

    if(resp === 200){
      alert('usuario cadastrado')
    }else{
      alert('faz direito ai kraio')
    }
  }catch(error){
    alert(error)
  }
 

  navigation.navigate('SignON3')
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

        <View style={[styles.pdfCvCont, styles.row]}>
          <View style={styles.gap}>
         <View>
          <Text style={[styles.DMSansBold, styles.formTitle]}>Anexar Currículo Vitae:</Text>
          <Text style={styles.DMSansRegular}>OBS: os arquivos devem estar{'\n'}no formato PDF </Text>
         </View>

         <TouchableOpacity style={styles.button}><Text style={[styles.DMSansBold, styles.buttonText]}>Selecionar Arquivo</Text></TouchableOpacity>
         </View>

         <View>
          <Text style={styles.DMSansRegular}>Arquivo Selecionado:</Text>
          <Text style={styles.DMSansRegular}>cv.pdf</Text>
         </View>
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
