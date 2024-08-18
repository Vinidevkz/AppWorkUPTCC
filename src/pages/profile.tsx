import React from "react";
import {
  View,
  Text,
  Image,
  StyleSheet,
  ScrollView,
  SafeAreaView,
} from "react-native";

import styles from "../styles/profile";

export default function SimpleScreen() {
  return (
    <SafeAreaView>
      <ScrollView>
        <View style={styles.profileBackgroundImageCont}>
          <Image
            source={require("../../assets/icons/postbg.jpg")}
            style={styles.profileBackgroundImg}
          />
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

              <View style={styles.profileIconBox}>
                <Image
                  source={require("../../assets/icons/manicon.png")}
                  style={styles.icon}
                />
              </View>

          </View>

          <View style={styles.profileBioCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Sobre mim:</Text>
            <Text style={[styles.DMSansBold, styles.text]}>Sou um Jovem Programador apaixonado por tecnologia e que busca aprender cada vez mais. Espero poder fazer parte e uma grande empresa e aprender com grandes profissionais!</Text>
            
          </View>

          <View style={styles.profilePrefsCont}>
            <Text style={[styles.DMSansBold, styles.title]}>Áreas de Interesse:</Text>

            <View style={styles.usersPrefBox}>
              <Text style={[styles.DMSansRegular, styles.text]}>Tecnologia</Text>
              <Text style={[styles.DMSansRegular, styles.text]}>Ciência da Computação</Text>
              <Text style={[styles.DMSansRegular, styles.text]}>Analista de Banco de Dados</Text>
            </View>
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
