import React, { useState, useContext } from "react";
import { View, Text, Image, ScrollView, SafeAreaView, TouchableOpacity } from "react-native";
import { Context } from "../pages/initialPages/context/provider";
import { useTheme } from "../pages/initialPages/context/themecontext";
import styles from "../styles/profile";
import ApisUrls from "../ApisUrls/apisurls.js";
import { useFocusEffect } from "@react-navigation/native";
import { FlatList, GestureHandlerRootView } from "react-native-gesture-handler";

export default function EmpresaProfile({ navigation }) {
  const { theme } = useTheme({ EmpresaProfile });
  const { empresaId } = useContext(Context);
  const [dadosEmpresa, setDadosEmpresa] = useState([]);
  const [dadosVaga, setDadosVaga] = useState([]);

  const { apiNgrokEmpresa, apiNgrokVagaEmpresa, apiEmuladorEmpresa, apiEmuladorVagaEmpresa } = ApisUrls;

  useFocusEffect(
    React.useCallback(() => {
      async function fetchUserData() {
        const apiUrl = `${apiEmuladorEmpresa}${empresaId}`;
        try {
          const response = await fetch(apiUrl);
          if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
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

  useFocusEffect(
    React.useCallback(() => {
      async function fetchVagaEmpresa() {
        const apiUrl = `${apiEmuladorVagaEmpresa}${empresaId}`;
        try {
          const response = await fetch(apiUrl);
          if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
          const data = await response.json();

          // Verifique se a data é um objeto e transforme em array
          const vagasArray = Array.isArray(data) ? data : [data];
          console.log("Vagas data:", vagasArray); // Verifique os dados aqui
          setDadosVaga(vagasArray);
        } catch (error) {
          console.error("Error fetching job data:", error);
        }
      }

      if (empresaId) {
        fetchVagaEmpresa();
      }
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
        <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
          <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Perfil da Empresa</Text>
        </View>
        <ScrollView contentContainerStyle={styles.scrollViewContent}>
          <View style={{ width: "100%" }}>
            <View style={styles.profileBackgroundImageCont}>
              <Image source={dadosEmpresa.fotoBanner ? { uri: dadosEmpresa.fotoBanner } : require("../../assets/icons/profilebgempty.png")} style={styles.profileBackgroundImg} />
              <View style={[styles.profileIconBox, { borderColor: theme.borderColor }]}>
                <Image source={dadosEmpresa.fotoUsuario ? { uri: dadosEmpresa.fotoUsuario } : require("../../assets/icons/manicon.jpg")} style={styles.icon} />
              </View>
            </View>

            <View style={[styles.profileCont, { backgroundColor: theme.backgroundColor }]}>
              <View style={[styles.profileHeader]}>
                <View>
                  <Text style={[styles.DMSansBold, styles.profileName, { color: theme.textColor }]}>{dadosEmpresa.nomeEmpresa || "Loading..."}</Text>
                  <Text style={[styles.DMSansRegular, styles.profileUserName, { color: theme.textColor }]}>@{dadosEmpresa.usernameEmpresa || "Loading..."}</Text>
                  <Text style={[styles.DMSansRegular, styles.profileUserLocation, { color: theme.textColor }]}>
                    {dadosEmpresa.cidadeEmpresa || "Loading..."} - {dadosEmpresa.estadoEmpresa || "Loading..."}
                  </Text>
                </View>
              </View>

              <View style={styles.profileBioCont}>
                <Text style={[styles.DMSansRegular, styles.text, { color: theme.textColor }]}>{dadosEmpresa.sobreEmpresa || "Loading..."}</Text>
              </View>

              <View style={[styles.line, { borderColor: theme.lineColor }]}></View>

              <View
                style={{
                  paddingVertical: 20,
                  paddingHorizontal: 15,
                  gap: 20,
                  borderRadius: 20,
                  borderWidth: 1,
                  borderColor: "#c4c4c4",
                }}
              >
                <View style={[styles.profilePrefsCont]}>
                  <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Vagas em aberto:</Text>
                  <FlatList
                    horizontal={true}
                    data={dadosVaga}
                    style={{ margiRight: 10 }}
                    keyExtractor={(item) => item.idVaga.toString()}
                    renderItem={({ item }) => (
                      <View style={[styles.vagaCont, { backgroundColor: theme.backgroundColorNavBar }]}>
                        <View style={styles.vagaHead}>
                          <Text style={[styles.titleVaga, styles.DMSansBold, { color: theme.textColor }]} numberOfLines={1}>{item.nomeVaga}</Text>
                          <Text style={[styles.corpText, styles.DMSansBold, { color: theme.textColor }]}>oferecido por: {item.empresa?.nomeEmpresa}</Text>
                          <Text style={[styles.dateText, styles.DMSansRegular, { color: theme.textColor }]}>publicada em: {item.prazoVaga}</Text>
                        </View>
                        <View style={[styles.vagaBody, {gap: 5}]}>
                          <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Modalidade: {item.modalidade?.descModalidadeVaga}</Text>
                          <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Salário: R${item.salarioVaga}</Text>
                          <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Cidade: {item.cidadeVaga}</Text>
                          <Text style={[styles.descVaga, styles.DMSansRegular, { color: theme.textColor }]}>Área: {item.area?.nomeArea || "Não disponível"}</Text>
                        </View>
                        <View style={styles.vagaFooterCont}>
                          <TouchableOpacity
                            style={[styles.button, styles.buttonVaga]}
                            onPress={() => {
                              setVagaID(item.idVaga);
                              navigation.navigate("Vagas");
                            }}
                          >
                            <Text style={[styles.buttonText, styles.DMSansBold]}>Ver Vaga</Text>
                          </TouchableOpacity>
                        </View>
                      </View>
                    )}
                  />
                </View>
              </View>

              <View style={styles.profileSkillsCont}>
                <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Publicações:</Text>
              </View>
              <View style={[styles.line, { borderColor: theme.lineColor }]}></View>
            </View>
          </View>
        </ScrollView>
      </SafeAreaView>
    </GestureHandlerRootView>
  );
}
