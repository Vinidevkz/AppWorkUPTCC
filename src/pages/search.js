import React, { useState, useEffect } from "react";
import {
  View,
  Text,
  TextInput,
  SafeAreaView,
  ActivityIndicator,
  FlatList,
  Image,
  TouchableOpacity,
} from "react-native";
import * as Font from "expo-font";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { useContext } from "react";
import ApisUrls from "../ApisUrls/apisurls.js";
import axios from "axios";
import FontAwesome from "@expo/vector-icons/FontAwesome";
import styles from "../styles/search.js";
import { Context } from "../pages/initialPages/context/provider";

const { apiNgrokVagaPesquisa } = ApisUrls;

export default function Search({ navigation }) {
  const { vagaID, setVagaID, empresaId, setEmpresaId } = useContext(Context);

  const { theme } = useTheme({ Search });
  const [data, setData] = useState([]);
  const [companies, setCompanies] = useState([]);
  const [searchText, setSearchText] = useState("");
  const [loading, setLoading] = useState(false);
  const [fontsLoaded, setFontsLoaded] = useState(false);
  const [debounceTimeout, setDebounceTimeout] = useState(null);
  const [errorMessage, setErrorMessage] = useState("");

  const buscaVaga = async (search) => {
    setLoading(true);
    setErrorMessage("");
    console.log(`URL da requisição: ${apiNgrokVagaPesquisa}`);
    try {
      console.log(`Buscando vagas com o termo: ${search}`);
      const response = await axios.post(apiNgrokVagaPesquisa, { search });
      console.log("Resposta da API:", response.data);

      if (response.data.message) {
        setErrorMessage(response.data.message);
        setData([]);
        setCompanies([]);
      } else {
        setData(response.data.vagas); // Supondo que `vagas` está no response
        setCompanies(response.data.empresas); // Supondo que `empresas` está no response
      }
    } catch (error) {
      console.error("Error fetching data:", error);
      setErrorMessage("Nada encontrado, tente novamente mais tarde.");
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    const loadFonts = async () => {
      await Font.loadAsync({
        "DMSans-Regular": require("../../assets/fonts/DMSans-Regular.ttf"),
        "DMSans-Bold": require("../../assets/fonts/DMSans-Bold.ttf"),
      });
      setFontsLoaded(true);
    };
    loadFonts();
  }, []);

  if (!fontsLoaded) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }

  const renderPlaceholder = () => (
    <View
      style={{
        height: '60%',
        alignItems: "center",
        justifyContent: "center",
        
      }}
    >
      <Image
        source={require("../../assets/img/img2.png")}
        style={{ width: 150, height: 250, alignSelf: "center" }}
      />
      <Text style={{ color: theme.textColor, fontFamily: "DMSans-Regular" }}>
        Busque por algo...
      </Text>
    </View>
  );

  const handleSearch = (text) => {
    setSearchText(text);

    if (debounceTimeout) clearTimeout(debounceTimeout);

    const timeout = setTimeout(() => {
      if (text.length > 0) {
        buscaVaga(text);
      } else {
        setData([]); // Limpa os dados se o texto tiver 0 caracteres
        setCompanies([]); // Limpa as empresas
        setErrorMessage("");
      }
    }, 300);

    setDebounceTimeout(timeout);
  };

  return (
    <SafeAreaView style={{backgroundColor: theme.backgroundColor}}>
      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar, flexDirection: 'row' },
        ]}
      >
        <View
          style={[
            styles.searchInput,
            { backgroundColor: theme.backgroundColorSearchInput },
          ]}
        >
          
          <TextInput
            placeholder="Pesquise por vagas e empresas..."
            placeholderTextColor={theme.placeholderColor}
            style={[
              styles.DMSansRegular,
              styles.searchFontSize,
              { color: theme.textColor },
            ]}
            onChangeText={handleSearch}
            value={searchText}
          />
  
        <View style={{ backgroundColor: '#20dd77',height: 45, width: 45, alignItems: 'center', justifyContent: 'center'}}>
          <FontAwesome name="search" size={23} color='#f4f4f4' />
        </View>

        </View>

      </View>
      <View style={{ height: "100%", backgroundColor: theme.backgroundColor }}>

      {searchText === '' && ''}

        {loading ? (
          <View
            style={{
              flex: 1,
              alignItems: 'center',
              justifyContent: 'center'
            }}
          >
            <ActivityIndicator size="large" color="#20dd77" />
          </View>
        ) : searchText === "" ? (
          renderPlaceholder()
        ) : (
          <View style={[{ alignItems: "flex-start", padding: 10 }]}>
            {errorMessage ? (
              <View>

                <Text
                  style={{
                    color: theme.textColor,
                    fontSize: 16,
                    marginVertical: 15,
                    alignSelf: "center",
                  }}
                >
                  {errorMessage}
                </Text>
              </View>
            ) : (
              <>
{!loading && (
  <Text
    style={[
      styles.DMSansBold,
      styles.title,
      { color: theme.textColor },
    ]}
  >
    Resultado:
  </Text>
)}

                  <FlatList
                    data={data} // Exibindo vagas
                    showsHorizontalScrollIndicator={false}
                    horizontal={true}
                    style={{
                      maxHeight: 300,
                      marginVertical: 10,
                    }}
                    keyExtractor={(item) =>
                      item.idVaga
                        ? item.idVaga.toString()
                        : Math.random().toString()
                    }
                    renderItem={({ item }) => (
                      <View
                        style={{
                          marginVertical: 10,
                          backgroundColor: theme.backgroundColorNavBar,
                          padding: 20,
                          borderRadius: 10,
                          gap: 20,
                          height: 180,
                          marginLeft: 10,
                          justifyContent: "space-between",
                          borderBottomWidth: 3,
                          borderColor: '#20dd77'
                        }}
                      >
                        <View>
                          <Text
                            style={[
                              styles.text,
                              styles.DMSansBold,
                              { color: theme.textColor },
                            ]}
                          >
                            {item.nomeVaga}
                          </Text>
                          <Text
                            style={[
                              styles.text,
                              styles.DMSansRegular,
                              { color: theme.textColor },
                            ]}
                          >
                            {item.nomeEmpresa || "Não disponível"}
                          </Text>
                          <Text style={{ color: theme.textColor }}>
                            R${item.salarioVaga} - {item.cidadeVaga}
                          </Text>
                        </View>
                        <TouchableOpacity
                          style={[styles.button, styles.buttonVaga]}
                          onPress={() => {
                            setVagaID(item.idVaga);
                            navigation.navigate("Vagas");
                          }}
                        >
                          <Text
                            style={[
                              styles.buttonText,
                              styles.DMSansBold,
                              { color: "#fff" },
                            ]}
 
                          >
                            Ver Vaga
                          </Text>
                        </TouchableOpacity>
                      </View>
                    )}
                  />
                
              </>
            )}

              


            {data.lenght === 0 ? (
              <ActivityIndicator size={'large'}/>
            ) : (
              <FlatList
              data={companies} // Usando o estado para empresas
              horizontal={true}
              showsHorizontalScrollIndicator={false}
              style={{
                maxHeight: 350,
                marginVertical: 10,
              }}
              keyExtractor={(item) =>
                item.idEmpresa
                  ? item.idEmpresa.toString()
                  : Math.random().toString()
              } // Assumindo que id_empresa é único
              renderItem={({ item }) => (
                <View
                  style={{
                    marginVertical: 10,
                    backgroundColor: theme.backgroundColorNavBar,
                    height: 300,
                    width: 300,
                    marginLeft: 10,
                    overflow: 'hidden',
                    borderRadius: 10,
                    borderBottomWidth: 3,
                    borderColor: '#20dd77'
                  }}
                >
                  <View
                    style={{
                      gap: 5,
                    }}
                  >

                    <View style={styles.profileBackgroundImageCont}>
                      <Image
                        source={
                          item.bannerEmpresa
                            ? { uri: item.bannerEmpresa }
                            : require("../../assets/icons/profilebgempty.png")
                        }
                        style={styles.profileBackgroundImg}
                      />

                      <View
                        style={[
                          styles.profileIconBox,
                          { borderColor: theme.borderColor },
                        ]}
                      >
                        <Image
                          source={
                            item.fotoEmpresa
                              ? { uri: item.fotoEmpresa }
                              : require("../../assets/icons/manicon.jpg")
                          }
                          style={styles.icon}
                        />
                      </View>
                    </View>



                    <View style={{margin: 15}}>
                      <Text
                        style={[
                          styles.text,
                          styles.DMSansBold,
                          { color: theme.textColor },
                        ]}
                      >
                        {item.nomeEmpresa}
                      </Text>
                      <Text
                        style={[
                          styles.text,
                          styles.DMSansRegular,
                          { color: theme.textColor },
                        ]}
                      >
                        {item.estadoEmpresa} - Tecnologia
                      </Text>
                    </View>
                  </View>
                  <TouchableOpacity
                    style={[
                      styles.button,
                      styles.buttonVaga,
                      {
                        backgroundColor: theme.backgroundColorNavBar,
                        borderWidth: 2,
                        borderColor: "#20dd77",
                        margin: 15,
                        width: 130
                      },
                    ]}
                     onPress={() => {
                       setEmpresaId(item.idEmpresa);
                       console.log("ID da empresa setado:", item.idEmpresa);
                       navigation.navigate("EmpresasProfile");
                     }}
                  >
                    <Text
                      style={[
                        styles.buttonText,
                        styles.DMSansBold,
                        { color: theme.textColor },
                      ]}
                    >
                      Ver Empresa
                    </Text>
                  </TouchableOpacity>
                </View>
              )}
            />
            )}

          </View>
        )}



      </View>
    </SafeAreaView>
  );
}
