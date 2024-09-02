import React from "react";
import {
  Text,
  View,
  SafeAreaView,
  ScrollView,
  TouchableOpacity,
  StatusBar,
} from "react-native";
import { useState } from "react";
import { useTheme } from "../pages/initialPages/context/themecontext";
import styles from "../styles/configuracoes";

import Feather from "@expo/vector-icons/Feather";

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
          <Text style={{color : theme.textColor}}>Voltar</Text>
        </TouchableOpacity>
        <Text
          style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}
        >
          Configurações
        </Text>
      </View>
      <View style={styles.container}>
        <View style={{ flexDirection: "row", alignItems: "center", gap: 10 }}>
          <Text
            style={[
              styles.DMSansRegular,
              styles.text,
              { color: theme.textColor },
            ]}
          >
            Aparência:{" "}
          </Text>
          <TouchableOpacity onPress={toggleTheme}>
            <Feather
              name={theme.iconColor === "#fff" ? "sun" : "moon"}
              size={24}
              color={theme.iconColor}
            />
          </TouchableOpacity>
        </View>
      </View>
    </SafeAreaView>
  );
}
