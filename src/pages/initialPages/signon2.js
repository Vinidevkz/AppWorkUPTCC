import React from "react";
import {
  View,
  Text,
  StatusBar,
  SafeAreaView,
  ActivityIndicator,
  TouchableOpacity,
  TextInput
} from "react-native";
import { TextInputMask } from "react-native-masked-text";
import { Picker } from "@react-native-picker/picker";

import styles from "./styles/signon.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";

import useFonts from "../../styles/fontloader/fontloader.js";
import { useContext, useState, useEffect } from "react";
import { Context } from "./context/provider.js";

import ApisUrls from '../../ApisUrls/apisurls.js'

export default function SignON2({ navigation }) {
  const { areaInt, setAreaInt, setTel, emailContato, setEmailContato, setNasc, setCep, cep } = useContext(Context);
  const [areaVagas, setAreaVagas] = useState([]);
  const [emailError, setEmailError] = useState('');
  const [areaInteresseUsuario, setAreaInteresseUsuario] = useState('');
  
  const { apiNgrokArea, apiEmuladorArea } = ApisUrls;

  useEffect(() => {
    async function pegarAreaVaga() {
      try {
        const request = await fetch(apiNgrokArea);
        const response = await request.json();
        setAreaVagas(response);
      } catch (error) {
        console.error("Erro ao buscar áreas de vagas:", error);
      }
    }

    pegarAreaVaga();
  }, []);

  const handleEmailChange = (text) => {
    // Verificar se há caracteres inválidos
    const isValid = /^[a-zA-Z0-9@.]*$/.test(text);
  
    if (!isValid) {
      setEmailError('O email deve conter apenas letras, números, "@" e "."');
    } else {
      // Verificar se há mais de um "@"
      const atSymbolCount = (text.match(/@/g) || []).length;
  
      if (atSymbolCount > 1) {
        setEmailError('O email só pode conter um "@"');
      } else {
        setEmailError(''); // Sem erros
      }
  
      setEmailContato(text); // Atualizar o estado do email
      console.log(emailContato)
    }
  };

  // Carregador de fontes
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

      <Text>{cep}</Text>      
      <View style={styles.mainContainer}>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Área de Interesse:
          </Text>

          <View style={{ overflow: "hidden", borderRadius: 20, elevation: 3}}>
          <Picker
            selectedValue={areaInteresseUsuario}
            style={[styles.inputCont, styles.text, styles.DMSansRegular]}
            onValueChange={(itemValue) => {
              setAreaInteresseUsuario(itemValue);
              setAreaInt(itemValue); // Atualiza o estado areaInt com o valor selecionado
            }}
            mode="dropdown"
          >
            <Picker.Item label="Selecione uma Área:" value=""/>
            {areaVagas.map((area, index) => (
              <Picker.Item
                key={index}
                label={area.nomeArea}
                value={area.nomeArea}
              />
            ))}
          </Picker>
          </View>
        </View>

        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Telefone:
          </Text>
          <TextInputMask
            type={"cel-phone"}
            options={{
              maskType: "BRL",
              withDDD: true,
              dddMask: "(99) ",
            }}
            placeholder="(99) 99999-9999"
            style={[styles.DMSansRegular, styles.inputCont]}
            onChangeText={(text) => setTel(text)}
          />
        </View>

        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Email para Contato:</Text>
          <TextInput placeholder="digite seu melhor email" style={[styles.DMSansRegular, styles.inputCont]} onChangeText={handleEmailChange}/>
          {emailError ? <Text style={{color: 'red'}}>{emailError}</Text> : null}
        </View>

        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Data de Nascimento:
          </Text>
          <TextInputMask
            type={"datetime"}
            options={{
              format: "DD/MM/YYYY",
            }}
            placeholder="DD/MM/AAAA"
            style={[styles.DMSansRegular, styles.inputCont]}
            onChangeText={(text) => setNasc(text)}
          />
        </View>

        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>CEP:</Text>
          <Text style={[styles.DMSansRegular, {color: '#909090', fontSize: 13}]}>Os dados de localização serão preenchidos automaticamente.</Text>
          <TextInputMask
            type={"zip-code"}
            placeholder="Digite seu CEP"
            style={[styles.DMSansRegular, styles.inputCont]}
            onChangeText={(text) => setCep(text)}
          />
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
          onPress={() => navigation.navigate("SignON4")}
        >
          <Text style={[styles.DMSansRegular, styles.nextText]}>Próximo</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#fff" barStyle="dark-content" />
    </SafeAreaView>
  );
}
