import React, { useState, useEffect } from 'react';
import { Text, View, ActivityIndicator } from 'react-native';
import * as Font from 'expo-font'

const FontLoader = () => {
    const [fontsLoaded, setFontsLoaded] = useState(false);
  
    useEffect(() => {
      const loadFonts = async () => {
        await Font.loadAsync({
          'Roboto-Regular': require('../../../assets/fonts/Roboto-Regular.ttf'),
          'Roboto-Bold': require('../../../assets/fonts/Roboto-Bold.ttf'),

        });
        setFontsLoaded(true);
      };
  
      loadFonts();
    }, []);
  
    if (!fontsLoaded) {
      return <ActivityIndicator size="large" color="#0000ff" />;
    }
};

export default FontLoader;