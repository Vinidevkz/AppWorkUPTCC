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
import ApisUrls from "../ApisUrls/apisurls.js";
import axios from "axios";
import FontAwesome from "@expo/vector-icons/FontAwesome";
import styles from "../styles/search.js";

const { apiEmuladorVagaPesquisa } = ApisUrls;

export default function Search() {
  const { theme } = useTheme({ Search });
  const [data, setData] = useState([]);
  const [searchText, setSearchText] = useState("");
  const [loading, setLoading] = useState(false);
  const [fontsLoaded, setFontsLoaded] = useState(false);
  const [debounceTimeout, setDebounceTimeout] = useState(null);
  const [errorMessage, setErrorMessage] = useState("");

  const buscaVaga = async (search) => {
    setLoading(true);
    setErrorMessage("");
    try {
        console.log(`Buscando vagas com o termo: ${search}`);
        const response = await axios.post(`${apiEmuladorVagaPesquisa}`, { search }); // Passando o termo de pesquisa como corpo da requisição
        console.log("URL da requisição:", `${apiEmuladorVagaPesquisa}`); // Log da URL
        console.log(response.data); // Logar a resposta da API
        if (response.data.message) {
            setErrorMessage(response.data.message);
            setData([]);
        } else {
            setData(response.data);
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
        alignItems: "center",
        justifyContent: "center",
        marginBottom: 200,
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
        setErrorMessage("");
      }
    }, 300);

    setDebounceTimeout(timeout);
  };

  return (
    <SafeAreaView style={{ flex: 1 }}>
      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar },
        ]}
      >
        <View
          style={[
            styles.searchInput,
            { backgroundColor: theme.backgroundColorSearchInput },
          ]}
        >
          <FontAwesome name="search" size={23} color={theme.iconColorWhite} />
          <TextInput
            placeholder="Pesquise por vagas e empresas..."
            style={[
              styles.DMSansRegular,
              styles.searchFontSize,
              { color: theme.textColor },
            ]}
            onChangeText={handleSearch}
            value={searchText}
          />
        </View>
      </View>
      <View style={{ height: "100%", backgroundColor: theme.backgroundColor }}>
        {loading ? (
          <View
            style={{
              position: "absolute",
              top: "50%",
              left: "50%",
              transform: [{ translateX: -25 }, { translateY: -25 }],
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
            style={[
                styles.DMSansBold,
                styles.title,
                { color: theme.textColor },
            ]}
        >
            Vagas:
        </Text>
        <Text style={{ color: theme.textColor, fontSize: 16, marginVertical: 15, alignSelf: 'center' }}>{errorMessage}</Text>
    </View>

            ) : (
              <>
                <Text
                  style={[
                    styles.DMSansBold,
                    styles.title,
                    { color: theme.textColor },
                  ]}
                >
                  Vagas:
                </Text>
                {data.length === 0 ? (
                  <Text style={{ color: theme.textColor, fontSize: 16 }}>Nada encontrado, tente novamente mais tarde.</Text>
                ) : (
                  <FlatList
                    data={data}
                    style={{ height: 300, width: "100%", borderRadius: 50, marginVertical: 10 }}
                    keyExtractor={(item) => item.idVaga.toString()}
                    renderItem={({ item }) => (
                      <View
                        style={{
                          marginVertical: 10,
                          backgroundColor: "#fff",
                          padding: 10,
                          flexDirection: "row",
                          alignItems: "center",
                          justifyContent: "space-between",
                          borderRadius: 10,
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
                            {item.area?.nomeArea}
                          </Text>
                        </View>
                        <TouchableOpacity
                          style={[styles.button, styles.buttonVaga]}
                          // onPress={() => {
                          //   setVagaID(item.idVaga);
                          //   navigation.navigate("Vagas");
                          // }}
                        >
                          <Text style={[styles.buttonText, styles.DMSansBold]}>
                            Ver Vaga
                          </Text>
                        </TouchableOpacity>
                      </View>
                    )}
                  />
                )}
              </>
            )}
            <Text
              style={[
                styles.DMSansBold,
                styles.title,
                { color: theme.textColor },
              ]}
            >
              Empresas:
            </Text>
            <FlatList
                    data={data}
                    style={{ height: 300, width: "100%", borderRadius: 50, marginVertical: 10 }}
                    keyExtractor={(item) => item.idVaga.toString()}
                    renderItem={({ item }) => (
                      <View
                        style={{
                          marginVertical: 10,
                          backgroundColor: "#fff",
                          padding: 10,
                          flexDirection: "row",
                          alignItems: "center",
                          justifyContent: "space-between",
                          borderRadius: 10,
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
                            {item.area?.nomeArea}
                          </Text>
                        </View>
                        <TouchableOpacity
                          style={[styles.button, styles.buttonVaga]}
                          // onPress={() => {
                          //   setVagaID(item.idVaga);
                          //   navigation.navigate("Vagas");
                          // }}
                        >
                          <Text style={[styles.buttonText, styles.DMSansBold]}>
                            Ver Vaga
                          </Text>
                        </TouchableOpacity>
                      </View>
                    )}
                  />
          </View>
        )}
      </View>
    </SafeAreaView>
  );
}
