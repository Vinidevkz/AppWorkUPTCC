import React from 'react';
import { View, Text, SafeAreaView, TextInput, TouchableOpacity } from 'react-native';
import { useTheme } from "../pages/initialPages/context/themecontext";
import { useContext, useEffect, useState } from "react";
import { Context } from "../pages/initialPages/context/provider.js";

import Ionicons from "@expo/vector-icons/Ionicons";

import styles from '../styles/profilechange.js'

export default function ProfileChange({navigation}) {
  const { theme, toggleTheme } = useTheme({ProfileChange});
  const { userId } = useContext(Context);

  const [dadosUser, setDadosUser] = useState([]);

  useEffect(() => {
    async function fetchUserData() {
      try {
        const response = await fetch(`https://f602-200-53-198-146.ngrok-free.app/api/usuario/${userId}`);
        const data = await response.json();
        setDadosUser(data);
        console.log("Fetched user data:", data);
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    }

    if (userId) {
      fetchUserData();
    }
  }, [userId]);

  return (
    <SafeAreaView>
      <View style={[styles.containerTop, {backgroundColor: theme.backgroundColorNavBar}]}>
      <TouchableOpacity onPress={() => navigation.goBack()}>
         <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite}  />
        </TouchableOpacity>
        <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Alterar Perfil:</Text>
      </View>
      <View style={{height: '90%', padding: 20,  backgroundColor: theme.backgroundColor, gap: 20}}>
        <View>
        <Text style={{color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18}}>Nome:</Text>
        <TextInput style={{backgroundColor:'#303030', width: 300, height: 40, borderRadius: 10,}}/>
        </View>
        <View>
        <Text style={{color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18}}>Nome de usuário:</Text>
        <TextInput style={{backgroundColor:'#303030', width: 300, height: 40, borderRadius: 10,}}/>
        </View>
        <View>
        <Text style={{color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18}}>Biografia:</Text>
        <TextInput style={{backgroundColor:'#303030', width: 300, height: 40, borderRadius: 10,}}/>
        </View>
        <View>
        <Text style={{color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18}}>Área de Interesse:</Text>
        <TextInput style={{backgroundColor:'#303030', width: 300, height: 40, borderRadius: 10,}}/>
        </View>
        <View>
        <Text style={{color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18}}>Competência:</Text>
        <TextInput style={{backgroundColor:'#303030', width: 300, height: 40, borderRadius: 10,}}/>
        </View>
        <View>
        <Text style={{color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18}}>Contatos:</Text>
        <TextInput style={{backgroundColor:'#303030', width: 300, height: 40, borderRadius: 10,}}/>
        </View>
      </View>
      
    </SafeAreaView>
  );
}

