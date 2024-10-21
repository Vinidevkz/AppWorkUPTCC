import React from "react";
import {
  View,
  Text,
  StatusBar,
  TextInput,
  SafeAreaView,
  ActivityIndicator,
  TouchableOpacity,
} from "react-native";

import styles from "./styles/signon.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from '@expo/vector-icons/AntDesign';
import FontAwesome6 from "@expo/vector-icons/FontAwesome6";
import FontAwesome from "@expo/vector-icons/FontAwesome";

import useFonts from "../../styles/fontloader/fontloader.js";
import { useContext, useState } from "react";
import { Context } from "./context/provider.js";

export default function SignON1({navigation}) {
  const {setNome, setUserName, setEmail, setSenha} = useContext(Context);
  const [emailError, setEmailError] = useState('');
  const [passwordVisible, setPasswordVisible] = useState(false)

  const [toggleNoEns, setToggleNoEns] = useState(true);
  const [toggleYesEns, setToggleYesEns] = useState(false);
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

    //Validação de Campos
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
    
        setEmail(text); // Atualizar o estado do email
      }
    };
    //

    const handleToggleNoEns = () => {
      setToggleNoEns(true);
      setToggleYesEns(false);
    };
  
    const handleToggleYesEns = () => {
      setToggleNoEns(false);
      setToggleYesEns(true);
    };

    

  return (
    <SafeAreaView>
      <View style={styles.header}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#1b1b1b" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title]}>Cadastro</Text>
      </View>

      <View style={[styles.mainContainer, {paddingBottom: 30}]}>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Nome:</Text>
          <TextInput placeholder="Digite seu nome" style={[styles.DMSansRegular, styles.inputCont]}
          onChangeText={(text)=>setNome(text)}
          maxLength={40}
          />
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Nome de usuário:</Text>
          <TextInput placeholder="Digite seu nome de usuário" style={[styles.DMSansRegular, styles.inputCont]}
          onChangeText={(text)=>setUserName(text)}
          maxLength={40}
          />
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Email:</Text>
          <TextInput placeholder="exemplo@gmail.com" style={[styles.DMSansRegular, styles.inputCont]} onChangeText={handleEmailChange}/>
          {emailError ? <Text style={{color: 'red'}}>{emailError}</Text> : null}
        </View>
        <View style={styles.formCont}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>Senha:</Text>
          <View style={styles.inputCont}>
          <TextInput placeholder="Crie uma senha" style={[styles.DMSansRegular, styles.inputText]} secureTextEntry={!passwordVisible}
          onChangeText={(text)=>setSenha(text)}
          />
          <TouchableOpacity onPress={() => setPasswordVisible(!passwordVisible)}>
            <FontAwesome6
                name={passwordVisible ? "eye-slash" : "eye"}
                size={20}
                color={"#1b1b1b"}
                style={{paddingHorizontal: 10
                }}
              />
          </TouchableOpacity>
          </View>
        </View>
        <View style={[styles.formCont2]}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Possui deficiência?:
          </Text>

          <View
            style={{
              marginVertical: 15,
              flexDirection: "row",
              alignItems: "center",
              justifyContent: "space-between",
            }}
          >
            <View
              style={{ flexDirection: "row", alignItems: "center", gap: 10 }}
            >
              <TouchableOpacity
                onPress={() => {
                  handleToggleNoEns();
                }}
              >
                <FontAwesome
                  name={toggleNoEns ? "circle" : "circle-o"}
                  size={35}
                  color="#20dd77"
                />
              </TouchableOpacity>
              <Text style={styles.DMSansRegular}>Não</Text>
            </View>

            <View
              style={{ flexDirection: "row", alignItems: "center", gap: 10 }}
            >
              <TouchableOpacity onPress={handleToggleYesEns}>
                <FontAwesome
                  name={toggleYesEns ? "circle" : "circle-o"}
                  size={35}
                  color="#20dd77"
                />
              </TouchableOpacity>
              <Text style={styles.DMSansRegular}>Sim</Text>
            </View>
          </View>

          {toggleYesEns ? (
            <View
              style={{
                flexDirection: "row",
                justifyContent: "center",
                gap: 20,
              }}
            >
              <View>
                <Text style={[styles.text, styles.DMSansRegular, {marginBottom: 5}]}>
                  Qual?:
                </Text>
                <View
                  style={{ overflow: "hidden", borderRadius: 20, elevation: 3 }}
                >
          <TextInput
            placeholder="Escreva detalhadamente sobre sua deficiência"
            style={[styles.bioCont, {height: 60}]}
            multiline={true}
            //onChangeText={(text) => setBio(text)}
            //value={bio}
          />
                </View>
              </View>
            </View>
          ) : (
            <View style={{ height: 60 }} />
          )}
        </View>
      </View>

      


      <View style={styles.footerCont}>
        <View></View>
        <TouchableOpacity style={styles.nextButton} onPress={() => navigation.navigate('SignON2')}>
          <Text style={[styles.DMSansRegular, styles.nextText]}>Próximo</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#fff" barStyle="dark-content" />
    </SafeAreaView>
  );
}


