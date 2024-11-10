import React from "react";
import { useEffect, useState, useContext } from "react";
import { SafeAreaView, ScrollView, StyleSheet, Text, TextInput, View, StatusBar, TouchableOpacity, FlatList } from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { Context } from "../pages/initialPages/context/provider";

import * as Font from "expo-font";
import styles from "../styles/conversas.js";
import Ionicons from "@expo/vector-icons/Ionicons";

export default function Chat({ navigation }) {

  const { theme } = useTheme({ Chat });
  const { userId, nomeEmpresa } = useContext(Context);

  const [fontsLoaded, setFontsLoaded] = useState(false);
  useEffect(() => {
    const loadFonts = async () => {
      await Font.loadAsync({
        "DMSans-Regular": require("../../assets/fonts/DMSans-Regular.ttf"),
        "DMSans-Bold": require("../../assets/fonts/DMSans-Bold.ttf"),
      });
      setFontsLoaded(true);
    };

    loadFonts();
  }, []);

  return (
    <SafeAreaView style={[styles.SafeAreaView, {backgroundColor: theme.backgroundColor}]}>
      <StatusBar barStyle={theme.textColor} />
      <View style={[styles.navbar, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor }]}>{nomeEmpresa}</Text>
      </View>

      <FlatList/>

      <View style={[styles.msgBox, {backgroundColor: theme.backgroundColorNavBar}]}>
        <TextInput style={[styles.input, {backgroundColor: theme.backgroundColor, color: theme.textColor}]} placeholder="Escreva uma mensagem..." placeholderTextColor={theme.textColor}/>

        <TouchableOpacity style={styles.sendBox}>
         <Ionicons name="send" size={24} color={theme.textColor} />
        </TouchableOpacity>
      </View>

    </SafeAreaView>
  );
}
