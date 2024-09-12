import React from "react";
import {
  Text,
  View,
  SafeAreaView,
  TouchableOpacity,
  StatusBar,
} from "react-native";
import { useState } from "react";
import { useTheme } from "../pages/initialPages/context/themecontext";
import styles from "../styles/configuracoes";

import Feather from "@expo/vector-icons/Feather";
import Ionicons from "@expo/vector-icons/Ionicons";

export default function Configurações({ navigation }) {
  const { theme, toggleTheme } = useTheme();

  return (
    <SafeAreaView
      style={{ backgroundColor: theme.backgroundColor, height: "100%" }}
    >
      <StatusBar
        backgroundColor={theme.statusBarBackground}
        barStyle={theme.statusBarColor}
      />

      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar },
        ]}
      >
        <TouchableOpacity onPress={() => navigation.goBack()}>
         <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite}  />
        </TouchableOpacity>
        <Text
          style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}
        >
          Configurações
        </Text>
      </View>

      <View style={styles.container}>
        <View style={{padding: 20, borderRadius: 15, backgroundColor: theme.backgroundColorNavBar}}>
          <View style={styles.infosCont}>
            <Text
              style={[
                styles.DMSansBold,
                styles.text,
                { color: theme.textColor },
              ]}
            >
              Aparência:{" "}
            </Text>
            <TouchableOpacity onPress={toggleTheme}>
              <Feather
                name={theme.mode}
                size={24}
                color={theme.iconColorWhite}
              />
            </TouchableOpacity>
          </View>
        </View>

        <View style={{padding: 20, borderRadius: 15, backgroundColor: theme.backgroundColorNavBar}}>
          <View style={styles.profileConfigCont}>
            <Text
              style={[
                styles.DMSansBold,
                styles.text,
                { color: theme.textColor },
              ]}
            >
              Perfil:{" "}
            </Text>

            <TouchableOpacity onPress={() => navigation.navigate('ProfileChange')}>
            <Text style={{backgroundColor: theme.backgroundCont, padding: 10, borderRadius: 10, color: theme.textColor, fontFamily: 'DMSans-Regular'} }>Alterar Perfil</Text>
            </TouchableOpacity>
            <TouchableOpacity >
            <Text  style={{backgroundColor: theme.backgroundCont, padding: 10, borderRadius: 10, color: "red", fontFamily: 'DMSans-Regular'} }>Excluir Conta</Text>
            </TouchableOpacity>
          </View>
        </View>
      </View>

      
    </SafeAreaView>
  );
}
