import React from 'react';
import { View, Text, TextInput, SafeAreaView, ScrollView, ActivityIndicator } from 'react-native';
import { useState, useEffect } from "react";
import * as Font from "expo-font";
import { useTheme } from "../pages/initialPages/context/themecontext";

import FontAwesome from '@expo/vector-icons/FontAwesome';

import styles from '../styles/search.js'

export default function Search() {
     const { theme, toggleTheme } = useTheme({Search});
    //Carregador de fontes
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
      return <View style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}><ActivityIndicator size="large" color="#20dd77" /></View>
    }
    //
  return (
    <SafeAreaView >
      <View style={[styles.containerTop, {backgroundColor: theme.backgroundColorNavBar}]}>
        <View style={[styles.searchInput, {backgroundColor: theme.backgroundColorSearchInput}]}>
         <FontAwesome name="search" size={23} color={theme.iconColorWhite} />
         <TextInput placeholder='Pesquise por vagas e empresas...' style={[styles.DMSansRegular, styles.searchFontSize, {color: theme.textColor}]}/>
        </View>
      </View>

        <View style={{height: '90%', backgroundColor: theme.backgroundColor}}>

        </View>

    </SafeAreaView>
  );
}
