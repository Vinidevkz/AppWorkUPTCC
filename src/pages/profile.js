import React from "react";
import {
  View,
  Text,
  Image,
  StyleSheet,
  ScrollView,
  SafeAreaView,
  TouchableOpacity
} from "react-native";

import styles from "../styles/profile";

export default function Profile() {
  return (
    <SafeAreaView>
      <ScrollView>
        <View style={styles.profileBackgroundImageCont}>
          <Image
            source={require("../../assets/icons/postbg.jpg")}
            style={styles.profileBackgroundImg}
          />
          <View style={styles.profileIconBox}>
            <Image
              source={require("../../assets/icons/manicon.png")}
              style={styles.icon}
            />
          </View>
        </View>

        <View style={styles.profileCont}>
          <View style={styles.profileHeader}>
            <View>
              <Text style={[styles.DMSansBold, styles.profileName]}>
                Marcos Andrade
              </Text>
              <Text style={[styles.DMSansRegular, styles.profileUserName]}>
                @marcosandrade
              </Text>
              <Text style={[styles.DMSansRegular, styles.profileUserLocation]}>
                sp, São Paulo
              </Text>
            </View>
          </View>

          <View style={styles.line}></View>

          <View style={styles.profileBioCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Sobre mim:</Text>
            <Text style={[styles.DMSansRegular, styles.text]}>
              Sou um Jovem Programador apaixonado por tecnologia e que busca
              aprender cada vez mais. Espero poder fazer parte e uma grande
              empresa e aprender com grandes profissionais!
            </Text>
          </View>

          <View style={styles.profilePrefsCont}>
            <Text style={[styles.DMSansBold, styles.title]}>
              Áreas de Interesse:
            </Text>

            <View style={styles.usersPrefBox}>
              <Text style={[styles.DMSansRegular, styles.text]}>
                Tecnologia
              </Text>
              <Text style={[styles.DMSansRegular, styles.text]}>
                Ciência da Computação
              </Text>
              <Text style={[styles.DMSansRegular, styles.text]}>
                Analista de Banco de Dados
              </Text>
            </View>
          </View>

          <View style={styles.profileSkillsCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Competências</Text>
            <Text style={[styles.DMSansRegular, styles.text]}>Técnico em Desenvolvimento de Sistemas</Text>
            <Text style={[styles.DMSansRegular, styles.text]}>Curso de Administração, 2 meses</Text>
          </View>

          <View style={styles.profileLinksCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Contatos: </Text>
            <View style={styles.linkLine}>
             <Text style={[styles.DMSansBold, styles.linkTitle]}>Instagram: </Text><TouchableOpacity style={styles.linkButton}><Text style={[styles.DMSansRegular, styles.linkText]}> @marcosandradevn2</Text></TouchableOpacity>
            </View>
            <View style={styles.linkLine}>
             <Text style={[styles.DMSansBold, styles.linkTitle]}>Twitter: </Text><TouchableOpacity style={styles.linkButton}><Text style={[styles.DMSansRegular, styles.linkText]}> @marcosandradevn2</Text></TouchableOpacity>
            </View>
          </View>

          <View style={styles.line}></View>


        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
