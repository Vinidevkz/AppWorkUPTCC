import React, { useState, useContext, useEffect } from "react";
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
import Entypo from "@expo/vector-icons/Entypo";
import Octicons from '@expo/vector-icons/Octicons';
import styles from "../styles/profile";

export default function Profile({ navigation }) {
  const { theme } = useTheme({ Profile });
  const { userId } = useContext(Context);
  const [dadosUser, setDadosUser] = useState([]);

  useEffect(() => {
    async function fetchUserData() {
      try {
        const response = await fetch(`http://10.0.2.2:8000/api/usuario/${userId}`);
        const data = await response.json();
        setDadosUser(data);
        console.log("Fetched user data:", data);
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    }

    if (userId) {
      fetchUserData();
    }
  }, [userId]);

  // Ensure default values for arrays if dadosUser is not yet loaded
  const interests = dadosUser?.areaInteresseUsuario || []; // Ensure this is an array
  const skills = dadosUser?.formacaoCompetenciaUsuario || []; // Ensure this is an array

  return (
    <SafeAreaView>
      <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
        <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Meu Perfil</Text>
        <TouchableOpacity onPress={() => navigation.navigate('Configurações')}>
          <Octicons name="gear" size={30} color={theme.iconColorWhite} />
        </TouchableOpacity>
      </View>
      <ScrollView contentContainerStyle={styles.scrollViewContent}>
        <View style={{ width: '100%' }}>
          <View style={styles.profileBackgroundImageCont}>
            <Image
              source={require("../../assets/icons/postbg.jpg")}
              style={styles.profileBackgroundImg}
            />
            <View style={[styles.profileIconBox, { borderColor: theme.borderColor }]}>
              <Image
                source={require("../../assets/icons/manicon.png")}
                style={styles.icon}
              />
            </View>
          </View>

          <View style={[styles.profileCont, { backgroundColor: theme.backgroundColor }]}>
            <View style={styles.profileHeader}>
              <View>
                <Text style={[styles.DMSansBold, styles.profileName, { color: theme.textColor }]}>
                  {dadosUser.nomeUsuario || "Loading..."}
                </Text>
                <Text style={[styles.DMSansRegular, styles.profileUserName, { color: theme.textColor }]}>
                  @{dadosUser?.usernameUsuario || "Loading..."}
                </Text>
                <Text style={[styles.DMSansRegular, styles.profileUserLocation, { color: theme.textColor }]}>
                  {dadosUser?.estadoUsuario || "Loading..."}
                </Text>
              </View>
            </View>

            <View style={[styles.line, { borderColor: theme.lineColor }]}></View>

            <View style={{ paddingVertical: 20, paddingHorizontal: 15, gap: 20, borderRadius: 20, backgroundColor: theme.backgroundColorNavBar }}>
              <View style={styles.profileBioCont}>
                <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Sobre mim:</Text>
                <Text style={[styles.DMSansRegular, styles.text, { color: theme.textColor }]}>
                  {dadosUser?.bio || "Loading..."}
                </Text>
              </View>

              <View style={styles.profilePrefsCont}>
                <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Áreas de Interesse:</Text>
                <View style={styles.usersPrefBox}>
                  {Array.isArray(interests) && interests.length > 0 ? (
                    interests.map((area, index) => (
                      <Text key={index} style={[styles.DMSansRegular, styles.text, { color: theme.textColor }]}>
                        {area}
                      </Text>
                    ))
                  ) : (
                    <Text style={[styles.DMSansRegular, styles.text, { color: theme.textColor }]}>Loading...</Text>
                  )}
                </View>
              </View>

              <View style={styles.profileSkillsCont}>
                <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Competências</Text>
                {Array.isArray(skills) && skills.length > 0 ? (
                  skills.map((competence, index) => (
                    <Text key={index} style={[styles.DMSansRegular, styles.text, { color: theme.textColor }]}>
                      {competence}
                    </Text>
                  ))
                ) : (
                  <Text style={[styles.DMSansRegular, styles.text, { color: theme.textColor }]}>Loading...</Text>
                )}
              </View>

              <View style={styles.profileLinksCont}>
                <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Contatos:</Text>
                <View style={styles.linkLine}>
                  <Text style={[styles.DMSansBold, styles.linkTitle, { color: theme.textColor }]}>Instagram:</Text>
                  <TouchableOpacity style={styles.linkButton}>
                    <Text style={[styles.DMSansRegular, styles.linkText, { color: theme.textColor }]}>
                      {dadosUser?.instagram || "Loading..."}
                    </Text>
                  </TouchableOpacity>
                </View>
                <View style={styles.linkLine}>
                  <Text style={[styles.DMSansBold, styles.linkTitle, { color: theme.textColor }]}>Twitter:</Text>
                  <TouchableOpacity style={styles.linkButton}>
                    <Text style={[styles.DMSansRegular, styles.linkText, { color: theme.textColor }]}>
                      {dadosUser?.twitter || "Loading..."}
                    </Text>
                  </TouchableOpacity>
                </View>
              </View>
            </View>
            <View style={[styles.line, { borderColor: theme.lineColor }]}></View>
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
