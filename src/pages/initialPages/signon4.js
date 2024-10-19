import React, { useContext, useState, useEffect } from "react";
import {
  View,
  Text,
  StatusBar,
  SafeAreaView,
  ActivityIndicator,
  TouchableOpacity,
  TextInput,
} from "react-native";
import { Picker } from "@react-native-picker/picker";

import styles from "./styles/signon.js";
import Ionicons from "@expo/vector-icons/Ionicons";
import AntDesign from "@expo/vector-icons/AntDesign";
import FontAwesome from "@expo/vector-icons/FontAwesome";

import useFonts from "../../styles/fontloader/fontloader.js";
import { Context } from "./context/provider.js";

import ApisUrls from "../../ApisUrls/apisurls.js";

export default function SignON4({ navigation }) {
  const { areaInt, setAreaInt, setTel, setNasc, setCep } = useContext(Context);
  const [linguas, setLinguas] = useState([]);
  const [linguaSelecionada, setLinguaSelecionada] = useState("");

  const [toggleNoLang, setToggleNoLang] = useState(true);
  const [toggleYesLang, setToggleYesLang] = useState(false);
  const [toggleNoEns, setToggleNoEns] = useState(true);
  const [toggleYesEns, setToggleYesEns] = useState(false);

  const { apiEmuladorArea, apiNgrokLinguas } = ApisUrls;

  useEffect(() => {
    async function pegarLingua() {
      try {
        const request = await fetch(apiNgrokLinguas);
        const response = await request.json();
        setLinguas(response);
        console.log(response);
      } catch (error) {
        console.error("Erro ao buscar linguagens:", error);
      }
    }

    pegarLingua();
  }, []);

  // Carregador de fontes
  const fontsLoaded = useFonts();

  if (!fontsLoaded) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }

  const handleToggleNoLang = () => {
    setToggleNoLang(true);
    setToggleYesLang(false);
  };

  const handleToggleYesLang = () => {
    setToggleNoLang(false);
    setToggleYesLang(true);
  };

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
        <TouchableOpacity onPress={() => navigation.navigate("Welcome")}>
          <Ionicons name="caret-back-circle-sharp" size={35} color="#1b1b1b" />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title]}>Cadastro</Text>
      </View>

      <View style={styles.mainContainer2}>
        <View style={[styles.formCont2, {marginBottom: 50}]}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Possui alguma língua estrangeira?:
          </Text>

          <View
            style={{
              marginVertical: 15,
              height: 55,
              flexDirection: "row",
              alignItems: "center",
              justifyContent: "space-between",
            }}
          >
            <View
              style={{ flexDirection: "row", alignItems: "center", gap: 10 }}
            >
              <TouchableOpacity onPress={handleToggleNoLang}>
                <FontAwesome
                  name={toggleNoLang ? "circle" : "circle-o"}
                  size={35}
                  color="#20dd77"
                />
              </TouchableOpacity>
              <Text style={styles.DMSansRegular}>Não</Text>
            </View>

            <View
              style={{ flexDirection: "row", alignItems: "center", gap: 10 }}
            >
              <TouchableOpacity onPress={handleToggleYesLang}>
                <FontAwesome
                  name={toggleYesLang ? "circle" : "circle-o"}
                  size={35}
                  color="#20dd77"
                />
              </TouchableOpacity>
              <Text style={styles.DMSansRegular}>Sim</Text>
            </View>
          </View>
          {toggleYesLang && (
            <View>
              <Text style={[styles.text, styles.DMSansRegular, {paddingLeft: 5, fontSize: 16}]}>Qual?</Text>
              <Picker
                style={[styles.inputCont, styles.text, styles.DMSansRegular]}
                selectedValue={linguaSelecionada}
                onValueChange={(itemValue) => setLinguaSelecionada(itemValue)}
              >
                {linguas.map((lingua, index) => (
                  <Picker.Item
                    key={index}
                    label={lingua.nomeLingua}
                    value={lingua.idLingua}
                  />
                ))}
              </Picker>
            </View>
          )}
        </View>

        <View style={styles.formCont2}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Possui ensino médio completo?:
          </Text>

          <View
            style={{
              marginVertical: 15,
              height: 55,
              flexDirection: "row",
              alignItems: "center",
              justifyContent: "space-between",
            }}
          >
            <View
              style={{ flexDirection: "row", alignItems: "center", gap: 10 }}
            >
              <TouchableOpacity onPress={handleToggleNoEns}>
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

        </View>

        <View style={[styles.formCont2, {height: 150}]}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Possui algum curso complementar?:
          </Text>

          <View
            style={{
              marginVertical: 15,
              height: 55,
              flexDirection: "row",
              alignItems: "center",
              justifyContent: "space-between",
            }}
          >
          <TextInput
            placeholder="Conte para nós sobre seus estudos!"
            style={styles.expCont}
            multiline={true}
            //onChangeText={(text) => setBio(text)}
            //value={bio}
          />
          </View>

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
          onPress={() => navigation.navigate("SignON3")}
        >
          <Text style={[styles.DMSansRegular, styles.nextText]}>Próximo</Text>
          <AntDesign name="right" size={24} color="black" />
        </TouchableOpacity>
      </View>

      <StatusBar backgroundColor="#20dd77" barStyle="dark-content" />
    </SafeAreaView>
  );
}
