import React from "react";
import { Text, View, SafeAreaView, TouchableOpacity, StatusBar } from "react-native";
import { useState } from "react";
import { useTheme } from "../pages/initialPages/context/themecontext";
import styles from "../styles/configuracoes";

import Feather from "@expo/vector-icons/Feather";
import MaterialIcons from "@expo/vector-icons/MaterialIcons";
import MaterialCommunityIcons from "@expo/vector-icons/MaterialCommunityIcons";

export default function Configurações({ navigation }) {
  const { theme, toggleTheme } = useTheme();

  return (
    <SafeAreaView style={{ backgroundColor: theme.backgroundColor, height: "100%" }}>
      <StatusBar backgroundColor={theme.statusBarBackground} barStyle={theme.statusBarColor} />

      <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
        <MaterialIcons name="arrow-back-ios" size={20} color={theme.textColor} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Configurações e Opções</Text>
      </View>

      <View style={styles.container}>
        <View style={{ padding: 20, borderRadius: 15, backgroundColor: theme.backgroundColorNavBar }}>
          <View style={styles.infosCont}>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Aparência: </Text>
            <TouchableOpacity onPress={toggleTheme}>
              <Feather name={theme.mode} size={24} color={theme.iconColorWhite} />
            </TouchableOpacity>
          </View>
        </View>

        <View style={{ padding: 20, borderRadius: 15, backgroundColor: theme.backgroundColorNavBar }}>
          <View style={[styles.infosCont, { flexDirection: "column", alignItems: "flex-start", gap: 25 }]}>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Opções de vagas:</Text>
            <TouchableOpacity style={{ flexDirection: "row", alignItems: "center", gap: 10 }} onPress={() => navigation.navigate("VagasSalvas")}>
              <MaterialCommunityIcons name="bookmark" size={24} color="#20dd77" />
              <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Vagas Salvas</Text>
            </TouchableOpacity>
          </View>
        </View>

        <View style={{ padding: 20, borderRadius: 15, backgroundColor: theme.backgroundColorNavBar }}>
          <View style={styles.profileConfigCont}>
            <Text style={[styles.DMSansBold, styles.text, { color: theme.textColor }]}>Perfil: </Text>

            <TouchableOpacity onPress={() => navigation.navigate("ProfileChange")}>
              <Text style={{ backgroundColor: theme.backgroundCont, padding: 10, borderRadius: 10, color: theme.textColor, fontFamily: "DMSans-Regular" }}>Alterar Perfil</Text>
            </TouchableOpacity>
            <TouchableOpacity>
              <Text style={{ backgroundColor: theme.backgroundCont, padding: 10, borderRadius: 10, color: "#ff5447", fontFamily: "DMSans-Regular" }}>Excluir Conta</Text>
            </TouchableOpacity>
          </View>
        </View>
      </View>
    </SafeAreaView>
  );
}
