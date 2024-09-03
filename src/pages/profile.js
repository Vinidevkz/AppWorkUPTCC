import React from "react";
import {
  View,
  Text,
  Image,
  ScrollView,
  SafeAreaView,
  TouchableOpacity,
} from "react-native";
import { useState } from "react";

import Configurações from "./configuracoes";
import { useTheme } from "../pages/initialPages/context/themecontext";

import Entypo from "@expo/vector-icons/Entypo";
import Octicons from '@expo/vector-icons/Octicons';

import styles from "../styles/profile";

export default function Profile({navigation}) {
  const { theme, toggleTheme } = useTheme({Profile});
  return (
    <SafeAreaView>
      <View style={[styles.containerTop, {backgroundColor: theme.backgroundColorNavBar}]}>
          <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Meu Perfil</Text>
          <TouchableOpacity onPress={() => navigation.navigate('Configurações')}>
            <Octicons name="gear" size={30} color={theme.iconColorWhite} />
          </TouchableOpacity>
      </View>
      <ScrollView contentContainerStyle={styles.scrollViewContent}>
        <View style={{width: '100%'}}>
          <View style={styles.profileBackgroundImageCont}>
            <Image
              source={require("../../assets/icons/postbg.jpg")}
              style={styles.profileBackgroundImg}
            />
            <View style={[styles.profileIconBox, {borderColor: theme.borderColor}]}>
              <Image
                source={require("../../assets/icons/manicon.png")}
                style={styles.icon}
              />
            </View>
          </View>

          <View style={[styles.profileCont, {backgroundColor: theme.backgroundColor}]}>
            <View style={styles.profileHeader}>
              <View>
                <Text style={[styles.DMSansBold, styles.profileName, {color: theme.textColor}]}>
                  Marcos Andrade
                </Text>
                <Text style={[styles.DMSansRegular, styles.profileUserName, {color: theme.textColor}]}>
                  @marcosandrade
                </Text>
                <Text style={[styles.DMSansRegular, styles.profileUserLocation, {color: theme.textColor}]}>
                  sp, São Paulo
                </Text>
              </View>
            </View>

            <View style={[styles.line, {borderColor: theme.lineColor}]}></View>

            <View style={{paddingVertical: 20, paddingHorizontal: 15, gap: 20, borderRadius: 20, backgroundColor: theme.backgroundColorNavBar}}>
              <View style={styles.profileBioCont}>
                <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Sobre mim:</Text>
                <Text style={[styles.DMSansRegular, styles.text, {color: theme.textColor}]}>
                  Sou um Jovem Programador apaixonado por tecnologia e que busca
                  aprender cada vez mais. Espero poder fazer parte e uma grande
                  empresa e aprender com grandes profissionais!
                </Text>
              </View>

              <View style={styles.profilePrefsCont}>
                <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>
                  Áreas de Interesse:
                </Text>

                <View style={styles.usersPrefBox}>
                  <Text style={[styles.DMSansRegular, styles.text, {color: theme.textColor}]}>
                    Tecnologia
                  </Text>
                  <Text style={[styles.DMSansRegular, styles.text, {color: theme.textColor}]}>
                    Ciência da Computação
                  </Text>
                  <Text style={[styles.DMSansRegular, styles.text, {color: theme.textColor}]}>
                    Analista de Banco de Dados
                  </Text>
                </View>
              </View>

              <View style={styles.profileSkillsCont}>
                <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Competências</Text>
                <Text style={[styles.DMSansRegular, styles.text, {color: theme.textColor}]}>
                  Técnico em Desenvolvimento de Sistemas
                </Text>
                <Text style={[styles.DMSansRegular, styles.text, {color: theme.textColor}]}>
                  Curso de Administração, 2 meses
                </Text>
              </View>

              

              <View style={styles.profileLinksCont}>
                <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Contatos: </Text>
                <View style={styles.linkLine}>
                  <Text style={[styles.DMSansBold, styles.linkTitle, {color: theme.textColor}]}>
                    Instagram:{" "}
                  </Text>
                  <TouchableOpacity style={styles.linkButton}>
                    <Text style={[styles.DMSansRegular, styles.linkText, {color: theme.textColor}]}>
                      {" "}
                      @marcosandradevn2
                    </Text>
                  </TouchableOpacity>
                </View>
                <View style={styles.linkLine}>
                  <Text style={[styles.DMSansBold, styles.linkTitle, {color: theme.textColor}]}>
                    Twitter:{" "}
                  </Text>
                  <TouchableOpacity style={styles.linkButton}>
                    <Text style={[styles.DMSansRegular, styles.linkText, {color: theme.textColor}]}>
                      {" "}
                      @marcosandradevn2
                    </Text>
                  </TouchableOpacity>
                </View>
              </View>
            </View>
            <View style={[styles.line, {borderColor: theme.lineColor}]}></View>
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}

