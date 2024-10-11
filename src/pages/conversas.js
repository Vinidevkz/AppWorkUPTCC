import React from "react";
import { useEffect, useState } from "react";
import { SafeAreaView, ScrollView, StyleSheet, Text, View, StatusBar, TouchableOpacity, FlatList, Button } from "react-native";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { Context } from "../pages/initialPages/context/provider";

import * as Font from "expo-font";
import styles from "../styles/conversas.js";
import Ionicons from "@expo/vector-icons/Ionicons";

export default function Conversas({ navigation }) {

  const { theme } = useTheme({ Conversas });

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


  /////////////
  const data = [
    { id: '1', fotoempresa: 'foto empresa', nomeempresa: 'Dynamo', lastmsg: 'Ultima Mensagem: 2 horas' },
    { id: '2', fotoempresa: 'foto empresa', nomeempresa: 'Green Solutions', lastmsg: 'Ultima Mensagem: 2 horas' },
  ];

  const renderItem = ({ item }) => (
    <TouchableOpacity onPress={() => navigation.navigate("Chat")}>
      <View style={styles.item}>
        <View style={{flexDirection: 'row', alignItems: 'center', gap: 10}}>
          <View style={styles.profileIconBox}><Text>{item.fotoempresa}</Text></View>

          <View>
              <Text style={[styles.DMSansBold, {color: theme.textColor}]}>{item.nomeempresa}</Text>
              <Text style={[styles.DMSansBold, {color: theme.textColor}]}>{item.lastmsg}</Text>
          </View>
        </View>
      </View>
    </TouchableOpacity>
  );
  /////////////

  return (
    <SafeAreaView style={[styles.SafeAreaView, {backgroundColor: theme.backgroundColor}]}>
      <StatusBar barStyle="dark-content" />
      
      <View style={[styles.navbar, { backgroundColor: theme.backgroundColorNavBar }]}>
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite} />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.titleVaga, { color: theme.textColor }]}>Suas Conversas</Text>
      </View>

        <FlatList
        data={data}
        renderItem={renderItem}
        key={item => item.id}
        />


    </SafeAreaView>
  );
}
