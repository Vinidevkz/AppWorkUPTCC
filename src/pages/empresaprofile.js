import React, { useState, useContext } from "react";
import {
  View,
  Text,
  Image,
  ScrollView,
  SafeAreaView,
  TouchableOpacity,
} from "react-native";
import { Context } from "../pages/initialPages/context/provider";
import { useTheme } from "../pages/initialPages/context/themecontext";
import Octicons from "@expo/vector-icons/Octicons";
import styles from "../styles/profile";
import ApisUrls from "../ApisUrls/apisurls.js";
import { useFocusEffect } from "@react-navigation/native";
import { FlatList, GestureHandlerRootView } from "react-native-gesture-handler";

export default function EmpresaProfile({ navigation }) {
  const { theme } = useTheme({ EmpresaProfile });
  const { empresaId } = useContext(Context);
  const [dadosEmpresa, setDadosEmpresa] = useState([]);
  const [dadosVaga, setDadosVaga] = useState([]);

  const { apiNgrokEmpresa, apiNgrokVagaEmpresa } = ApisUrls;

  useFocusEffect(
    React.useCallback(() => {
      async function fetchUserData() {
        const apiUrl = `${apiNgrokEmpresa}${empresaId}`;
        try {
          const response = await fetch(apiUrl);
          if (!response.ok)
            throw new Error(`HTTP error! status: ${response.status}`);
          const data = await response.json();
          setDadosEmpresa(data);
        } catch (error) {
          console.error("Error fetching user data:", error);
        }
      }

      if (empresaId) {
        fetchUserData();
      }
    }, [empresaId])
  );

  // Adicionando a função fetchVagaEmpresa dentro do useFocusEffect
  useFocusEffect(
    React.useCallback(() => {
      async function fetchVagaEmpresa() {
        const apiUrl = `${apiNgrokVagaEmpresa}${empresaId}`;
        try {
          const response = await fetch(apiUrl);
          if (!response.ok)
            throw new Error(`HTTP error! status: ${response.status}`);
          const data = await response.json();
          setDadosVaga(data);
          console.log(dadosVaga); // Log dos dados recebidos
        } catch (error) {
          console.error("Error fetching job data:", error);
        }
      }

      fetchVagaEmpresa();
    }, [empresaId])
  );

  const renderItem = ({ item }) => (
    <View style={{ backgroundColor: "#f4f4f4", padding: 10, margin: 5 }}>
      <Text style={styles.title}>{item.nomeVaga}</Text>
      <Text>
        {item.cidadeVaga} - {item.estadoVaga}
      </Text>
      <Text>{item.salarioVaga}</Text>
    </View>
  );

  return (
    <GestureHandlerRootView style={{ flex: 1 }}>
      <SafeAreaView>
        <View
          style={[
            styles.containerTop,
            { backgroundColor: theme.backgroundColorNavBar },
          ]}
        >
          <Text
            style={[
              styles.DMSansBold,
              styles.title,
              { color: theme.textColor },
            ]}
          >
            Perfil da Empresa
          </Text>
          <TouchableOpacity
            onPress={() => navigation.navigate("Configurações")}
          >
            <Octicons name="gear" size={30} color={theme.iconColorWhite} />
          </TouchableOpacity>
        </View>
        <ScrollView contentContainerStyle={styles.scrollViewContent}>
          <View style={{ width: "100%" }}>
            <View style={styles.profileBackgroundImageCont}>
              <Image
                source={
                  dadosEmpresa.fotoBanner
                    ? { uri: dadosEmpresa.fotoBanner }
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
                    dadosEmpresa.fotoUsuario
                      ? { uri: dadosEmpresa.fotoUsuario }
                      : require("../../assets/icons/manicon.jpg")
                  }
                  style={styles.icon}
                />
              </View>
            </View>

            <View
              style={[
                styles.profileCont,
                { backgroundColor: theme.backgroundColor },
              ]}
            >
              <View style={styles.profileHeader}>
                <View>
                  <Text
                    style={[
                      styles.DMSansBold,
                      styles.profileName,
                      { color: theme.textColor },
                    ]}
                  >
                    {dadosEmpresa.nomeEmpresa || "Loading..."}
                  </Text>
                  <Text
                    style={[
                      styles.DMSansRegular,
                      styles.profileUserName,
                      { color: theme.textColor },
                    ]}
                  >
                    @{dadosEmpresa.usernameEmpresa || "Loading..."}
                  </Text>
                  <Text
                    style={[
                      styles.DMSansRegular,
                      styles.profileUserLocation,
                      { color: theme.textColor },
                    ]}
                  >
                    {dadosEmpresa.cidadeEmpresa || "Loading..."} -{" "}
                    {dadosEmpresa.estadoEmpresa || "Loading..."}
                  </Text>
                </View>
              </View>

              <View style={styles.profileBioCont}>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.text,
                    { color: theme.textColor },
                  ]}
                >
                  {dadosEmpresa.sobreEmpresa || "Loading..."}
                </Text>
              </View>

              <View
                style={[styles.line, { borderColor: theme.lineColor }]}
              ></View>

              <View
                style={{
                  paddingVertical: 20,
                  paddingHorizontal: 15,
                  gap: 20,
                  borderRadius: 20,
                  backgroundColor: theme.backgroundColorNavBar,
                }}
              >
                <View style={styles.profilePrefsCont}>
                  <Text
                    style={[
                      styles.DMSansBold,
                      styles.title,
                      { color: theme.textColor },
                    ]}
                  >
                    Vagas em aberto:
                  </Text>
                  <FlatList
                    data={
                      Array.isArray(dadosVaga) && dadosVaga.length > 0
                        ? dadosVaga
                        : []
                    }
                    renderItem={renderItem}
                    keyExtractor={(item) => item.idVaga.toString()}
                    horizontal={true}
                    ListEmptyComponent={
                      <Text style={{ color: theme.textColor }}>
                        Nenhuma vaga disponível
                      </Text>
                    }
                  />
                </View>

                <View style={styles.profileSkillsCont}>
                  <Text
                    style={[
                      styles.DMSansBold,
                      styles.title,
                      { color: theme.textColor },
                    ]}
                  >
                    Publicações:
                  </Text>
                  <Text
                    style={[
                      styles.DMSansRegular,
                      styles.text,
                      { color: theme.textColor },
                    ]}
                  >
                    {dadosEmpresa.formacaoCompetenciaUsuario}
                  </Text>
                </View>
              </View>
              <View
                style={[styles.line, { borderColor: theme.lineColor }]}
              ></View>
            </View>
          </View>
        </ScrollView>
      </SafeAreaView>
    </GestureHandlerRootView>
  );
}
