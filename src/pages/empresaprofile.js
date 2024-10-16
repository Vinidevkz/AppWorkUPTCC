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

export default function EmpresaProfile({ navigation }) {
  const { theme } = useTheme({ EmpresaProfile });
  const { empresaId } = useContext(Context);
  const [dadosUser, setDadosUser] = useState([]);

  const { apiEmuladorUsuario, apiNgrokUsuario, apiNgrokEmpresa } = ApisUrls;

  useFocusEffect(
    React.useCallback(() => {
      console.log(empresaId);
      async function fetchUserData() {
        const apiUrl = `${apiNgrokEmpresa}${empresaId}`;
        console.log("Fetching URL:", apiUrl);

        try {
          const response = await fetch(apiUrl);
          console.log("Response status:", response.status);
          console.log(
            "Response headers:",
            response.headers.get("content-type")
          );

          if (!response.ok) {
            const errorText = await response.text();
            console.error(`Error: ${response.status} - ${errorText}`);
            return;
          }

          const data = await response.text(); // Obtenha como texto
          try {
            const jsonData = JSON.parse(data); // Tente converter para JSON
            setDadosUser(jsonData);
            console.log("Fetched user data:", jsonData);
          } catch (error) {
            console.error("Error parsing JSON:", error);
          }
        } catch (error) {
          console.error("Error fetching user data:", error);
        }
      }

      if (empresaId) {
        fetchUserData();
      }
    }, [empresaId])
  );

  const interests = dadosUser?.areaInteresseUsuario || [];
  const skills = dadosUser?.formacaoCompetenciaUsuario || [];

  return (
    <SafeAreaView>
      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar },
        ]}
      >
        <Text
          style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}
        >
          Perfil da Empresa
        </Text>
        <TouchableOpacity onPress={() => navigation.navigate("Configurações")}>
          <Octicons name="gear" size={30} color={theme.iconColorWhite} />
        </TouchableOpacity>
      </View>
      <ScrollView contentContainerStyle={styles.scrollViewContent}>
        <View style={{ width: "100%" }}>
          <View style={styles.profileBackgroundImageCont}>
            <Image
              source={
                dadosUser.fotoBanner
                  ? { uri: dadosUser.fotoBanner }
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
                source={dadosUser.fotoUsuario ? { uri: dadosUser.fotoUsuario } : require("../../assets/icons/manicon.jpg")}
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
                  {dadosUser.nomeUsuario || "Loading..."}
                </Text>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.profileUserName,
                    { color: theme.textColor },
                  ]}
                >
                  @{dadosUser.usernameUsuario || "Loading..."}
                </Text>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.profileUserLocation,
                    { color: theme.textColor },
                  ]}
                >
                  {dadosUser.cidadeUsuario  || "Loading..."} - {dadosUser.estadoUsuario || "Loading..."}
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
                {dadosUser.sobreUsuario || "Loading..."}
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
                  Áreas de Interesse:
                </Text>
                <View style={styles.usersPrefBox}>
                  <Text
                    style={[
                      styles.DMSansRegular,
                      styles.text,
                      { color: theme.textColor },
                    ]}
                  >
                    {dadosUser.areaInteresseUsuario || "Loading..."}
                  </Text>
                </View>
              </View>

              <View style={styles.profileSkillsCont}>
                <Text
                  style={[
                    styles.DMSansBold,
                    styles.title,
                    { color: theme.textColor },
                  ]}
                >
                  Competências
                </Text>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.text,
                    { color: theme.textColor },
                  ]}
                >
                  {dadosUser.formacaoCompetenciaUsuario}
                </Text>
              </View>

              <View style={styles.profileLinksCont}>
                <Text
                  style={[
                    styles.DMSansBold,
                    styles.title,
                    { color: theme.textColor },
                  ]}
                >
                  Contatos:
                </Text>
                <View style={styles.linkLine}>
                  <Text
                    style={[
                      styles.DMSansBold,
                      styles.linkTitle,
                      { color: theme.textColor },
                    ]}
                  >
                    Telefone:{" "}
                  </Text>
                  <Text
                    style={[
                      styles.DMSansRegular,
                      styles.linkText,
                      { color: theme.textColor },
                    ]}
                  >
                    {dadosUser?.contatoUsuario || "Loading..."}
                  </Text>
                </View>
              </View>
            </View>
            <View
              style={[styles.line, { borderColor: theme.lineColor }]}
            ></View>
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}