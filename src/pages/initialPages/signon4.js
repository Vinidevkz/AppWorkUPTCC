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
  const {
    linguaEstrangeira,
    setLinguaEstrangeira,
    ensinoMedio,
    setEnsinoMedio,
    anoFormacao,
    setAnoFormacao,
    formacaoUsuario,
    setFormacaoUsuario,
  } = useContext(Context);
  const [linguas, setLinguas] = useState([]);
  const [escolas, setEscolas] = useState([]);

  const [toggleNoEns, setToggleNoEns] = useState(true);
  const [toggleYesEns, setToggleYesEns] = useState(false);

  const anos = Array.from({ length: 45 }, (_, i) => 2024 - i);

  const {
    apiEmuladorArea,
    apiNgrokLinguas,
    apiEmuladorEscolas,
    apiNgrokEscolas,
  } = ApisUrls;

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

  useEffect(() => {
    async function pegarEscola() {
      try {
        const request = await fetch(apiNgrokEscolas);
        const response = await request.json();
        setEscolas(response);
        console.log(response);
      } catch (error) {
        console.error("Erro ao buscar escolas:", error);
      }
    }

    pegarEscola();
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
        <View style={[styles.formCont2]}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Possui alguma língua estrangeira?:
          </Text>

          <View style={{ overflow: "hidden", borderRadius: 20, elevation: 3 }}>
          <Picker
  style={[styles.inputCont, styles.text, styles.DMSansRegular]}
  selectedValue={linguaEstrangeira}
  onValueChange={(itemValue) => {
    // Atualiza o estado com o valor diretamente selecionado
    setLinguaEstrangeira(itemValue);
    console.log("Língua Selecionada:", itemValue); // Para verificar
  }}
  mode="dropdown"
>
  <Picker.Item label="Nenhuma" value="" />
  {linguas && linguas.map((lingua, index) => (
    <Picker.Item
      key={index}
      label={lingua.nomeLingua}
      value={lingua.nomeLingua} // Armazena o nome da língua como valor
    />
  ))}
</Picker>



          </View>
        </View>

        <View style={[styles.formCont2]}>
          <Text style={[styles.DMSansRegular, styles.formTitle]}>
            Possui ensino médio completo?:
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
                  setEnsinoMedio(null);
                  console.log(ensinoMedio)
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
                <Text style={[styles.text, styles.DMSansRegular]}>
                  Instituição:
                </Text>
                <View
                  style={{ overflow: "hidden", borderRadius: 20, elevation: 3 }}
                >
<Picker
  selectedValue={ensinoMedio} // Deve armazenar o nome da escola
  style={[styles.inputCont, styles.text, styles.DMSansRegular, { width: 200 }]}
  onValueChange={(itemValue) => {
    // Atualiza o estado com o valor diretamente selecionado
    setEnsinoMedio(itemValue);
    console.log("Escola Selecionada:", itemValue); // Para verificar
  }}
  mode="dropdown"
>
  <Picker.Item label="Nenhuma" value="" />
  {escolas && escolas.map((escola, index) => (
    <Picker.Item
      key={index}
      label={escola.nomeEscola} // Usando o nome da escola como label
      value={escola.nomeEscola} // Armazena o nome da escola como valor
    />
  ))}
</Picker>





                </View>
              </View>
              <View>
                <Text style={[styles.text, styles.DMSansRegular]}>
                  Ano de Formação:
                </Text>
                <View
                  style={{ overflow: "hidden", borderRadius: 20, elevation: 3 }}
                >
                  <Picker
                    style={[
                      styles.inputCont,
                      styles.text,
                      styles.DMSansRegular,
                      { width: 130 },
                    ]}
                    selectedValue={anoFormacao}
                    onValueChange={(itemValue) => setAnoFormacao(itemValue)}
                  >
                    <Picker.Item label="Selecione um ano" value={null} />
                    {anos.map((ano, index) => (
                      <Picker.Item
                        key={index}
                        label={ano.toString()}
                        value={ano}
                      />
                    ))}
                  </Picker>
                </View>
              </View>
            </View>
          ) : (
            <View style={{ height: 60 }} />
          )}
        </View>

        <View style={[styles.formCont2, { height: 150, marginTop: 20 }]}>
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
              onChangeText={(text) => setFormacaoUsuario(text)}
              value={formacaoUsuario}
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

      <StatusBar backgroundColor="#fff" barStyle="dark-content" />
    </SafeAreaView>
  );
}
