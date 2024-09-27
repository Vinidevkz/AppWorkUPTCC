import React from 'react';
import { View, Text, TextInput, SafeAreaView, ScrollView, ActivityIndicator, FlatList, Image } from 'react-native';
import { useState, useEffect } from "react";
import * as Font from "expo-font";
import { useTheme } from "../pages/initialPages/context/themecontext";
import ApisUrls from '../ApisUrls/apisurls.js';
const { apiEmuladorVaga } = ApisUrls;

import FontAwesome from '@expo/vector-icons/FontAwesome';

import styles from '../styles/search.js'

export default function Search() {
     const { theme, toggleTheme } = useTheme({Search});

     const [data, setData] = useState(null);

    const [searchText, setSearchText] = useState('')

    const buscaVaga = async () => {
      setLoading(true);
      try {
        const response = await axios.get(apiEmuladorVaga);
        setData(response.data);
      } catch (error) {
        console.error("Error fetching data:", error);
        setError(error.message);
      } finally {
        setLoading(false);
      }
    };
  
    useEffect(() => {
      buscaVaga();
    }, []);


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
         <TextInput placeholder='Pesquise por vagas e empresas...' style={[styles.DMSansRegular, styles.searchFontSize, {color: theme.textColor}]} onChangeText={(text) => setSearchText(text)}/>
        </View>
      </View>

        <View style={{height: '100%', backgroundColor: theme.backgroundColor, justifyContent: 'center'}}>
        {searchText === '' ? (
                    <View style={{alignItems: 'center', justifyContent: 'center', marginBottom: 250}}>
                    <Image
                    source={require('../../assets/img/img2.png')}
                    style={{width: 150, height: 250, alignSelf: 'center'}}
                    />
                    <Text style={{color: theme.textColor, fontFamily: 'DMSans-Regular'}}>Busque por algo...</Text>
                    </View>
                ) : (
                    <FlatList
                        data={[data]} 
                        keyExtractor={(item) => item.idVaga.toString()}
                        renderItem={({item}) => (
                          <Text>{data.nomeVaga}</Text>
                        )} 
                    />
                )}
        </View>

    </SafeAreaView>
  );
}
