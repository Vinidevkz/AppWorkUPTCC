import React, { useState, useEffect, useContext } from 'react';
import { View, Text, SafeAreaView, FlatList } from 'react-native';
import { Context } from "../pages/initialPages/context/provider";
import { useTheme } from "../pages/initialPages/context/themecontext";
import axios from 'axios';
import ApisUrls from "../ApisUrls/apisurls.js";
import styles from '../styles/notifications.js';

export default function Notifications() {
  const { theme } = useTheme({ Notifications });
  const { userId } = useContext(Context);
  const [notifications, setNotifications] = useState([]);

  const { apiNgrokNotificacoes } = ApisUrls;

  useEffect(() => {
    const fetchNotifications = async () => {
      try {
        const response = await axios.get(`${apiNgrokNotificacoes}/${userId}`);
        const newNotifications = response.data;
  
        setNotifications((prevNotifications) => {
          // Filtra notificações duplicadas
          const updatedNotifications = newNotifications.filter(
            (newItem) => !prevNotifications.some(
              (existingItem) => existingItem.idVagaUsuario === newItem.idVagaUsuario
            )
          );
  
          // Atualiza o estado, concatenando notificações novas no início da lista
          if (updatedNotifications.length > 0) {
            return [...updatedNotifications, ...prevNotifications]; // Concatenando no início
          }
          
          return prevNotifications; // Caso não haja notificações novas, apenas retorna o estado anterior
        });
  
      } catch (erro) {
        console.log(erro);
      }
    };
  
    fetchNotifications(); // Requisição imediata
  
    const intervaloId = setInterval(fetchNotifications, 2000); // Requisições a cada 2 segundos
  
    return () => clearInterval(intervaloId); // Limpa o intervalo quando o componente desmonta
  }, [userId, apiNgrokNotificacoes]);
  

  // Função de renderização de cada item
  const renderItem = ({ item }) => (
    <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 10, borderRadius: 5, marginVertical: 10 }}>
      <Text style={[styles.DMSansBold, { color: theme.textColor, fontSize: 18 }]}>Titulo</Text>
      <Text style={[styles.DMSansRegular, { color: theme.textColor, fontSize: 13 }]}>
        A empresa aprovou sua candidatura na vaga: {item.vaga?.nomeVaga}
      </Text>
    </View>
  );

  return (
    <SafeAreaView>
      <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
        <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>Notificações:</Text>
      </View>

      <View style={{ height: '100%', paddingBottom: 150, backgroundColor: theme.backgroundColor }}>
        {notifications.length === 0 ? (
          <Text style={[styles.DMSansRegular, { color: theme.textColor, textAlign: 'center' }]}>
            Nenhuma notificação
          </Text>
        ) : (
<FlatList
  data={notifications}
  keyExtractor={(item) => item.idVagaUsuario.toString()}  // Certifique-se de usar uma chave única aqui
  renderItem={renderItem}
  contentContainerStyle={{ paddingHorizontal: 20 }}
  showsVerticalScrollIndicator={false}
  extraData={notifications}
/>

        )}
      </View>
    </SafeAreaView>
  );
}
