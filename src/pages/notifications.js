import React from 'react';
import { View, Text, StyleSheet, SafeAreaView, ScrollView } from 'react-native';
import { Context } from "../pages/initialPages/context/provider";
import { useTheme } from "../pages/initialPages/context/themecontext";
import { useState, useContext, useEffect } from 'react';
import ApisUrls from "../ApisUrls/apisurls.js";
import axios from 'axios';

import styles from '../styles/notifications.js'

export default function Notifications() {
  const { theme, toggleTheme } = useTheme({Notifications});
  const { userId } = useContext(Context);
  const [notifications, setNotifications] = useState([])

  const { apiNgrokNotificacoes } = ApisUrls;

  useEffect(() => {
    const fetchNotifications = async () => {
      try {
        const response = await axios.get(`${apiNgrokNotificacoes}/${userId}`);
        setNotifications(response.data);
        console.log(notifications);
        console.log(`${apiNgrokNotificacoes}/${userId}`)
      } catch (erro) {
        console.log(erro);
      }
    };

    fetchNotifications(); // Primeira requisição imediata

    const intervaloId = setInterval(fetchNotifications, 2000); // Requisições a cada 2 segundos

    return () => clearInterval(intervaloId); // Limpa o intervalo ao desmontar o componente
  }, []);


  return (
    <SafeAreaView>
      <View style={[styles.containerTop, {backgroundColor: theme.backgroundColorNavBar}]}>
        <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Notificações:</Text>
      </View>
      <View style={{height: '100%', paddingBottom: 150, alignItems: 'center', justifyContent: 'center', backgroundColor: theme.backgroundColor}}>
        <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Nenhuma notificação</Text>
      </View>
    </SafeAreaView>

  );
}

