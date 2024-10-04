import React from "react";
import {
  View,
  Text,
  ActivityIndicator,
  TouchableOpacity,
  SafeAreaView,
  ScrollView,
  Image,
  StatusBar,
} from "react-native";
import { useState, useContext, useEffect } from "react";
import Ionicons from "@expo/vector-icons/Ionicons";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
import { useFocusEffect } from "@react-navigation/native";
import axios from "axios";
import * as Font from "expo-font";
import styles from "../styles/vagas.js";
import { useTheme } from "../pages/initialPages/context/themecontext";

export default function MinhasVagas({ navigation }) {
  const { theme } = useTheme({ MinhasVagas });
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

  if (!fontsLoaded) {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <ActivityIndicator size="large" color="#20dd77" />
      </View>
    );
  }

  return (
    <SafeAreaView style={styles.SafeAreaView}>
      <ScrollView
        style={{
          flex: 1,
          gap: 50,
          backgroundColor: theme.backgroundColor,
        }}
      >
        <StatusBar
          backgroundColor={theme.statusBarBackground}
          barStyle={theme.statusBarColor}
        />
      <View style={[styles.containerTop, {backgroundColor: theme.backgroundColorNavBar}]}>
        <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Vagas Salvas:</Text>
      </View>

      
      </ScrollView>
    </SafeAreaView>
  );
}
