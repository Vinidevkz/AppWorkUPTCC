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

  const { apiEmuladorNotificacoes } = ApisUrls;

  useEffect(() => {
    const fetchNotifications = async () => {
      try {
        const response = await axios.get(`${apiEmuladorNotificacoes}/${userId}`);
        
        // Verificar se a resposta contém notificações e garantir que novas notificações não sejam duplicadas
        setNotifications(prevNotifications => {
          const newNotifications = response.data;

          // Garantir que não adicionaremos notificações duplicadas
          const updatedNotifications = newNotifications.filter(
            newItem => !prevNotifications.some(existingItem => existingItem.idNotificacao === newItem.idNotificacao)
          );

          // Se houverem novas notificações, concatene-as com o estado anterior
          if (updatedNotifications.length > 0) {
            return [...prevNotifications, ...updatedNotifications];
          }

          return prevNotifications; // Caso não haja novas notificações, apenas retorne o estado anterior
        });

        console.log('Notificações:', response.data);
        console.log(`${apiEmuladorNotificacoes}/${userId}`);
      } catch (erro) {
        console.log(erro);
      }
    };

    fetchNotifications(); // Primeira requisição imediata

    const intervaloId = setInterval(fetchNotifications, 2000); // Requisições a cada 2 segundos

    return () => clearInterval(intervaloId); // Limpa o intervalo ao desmontar o componente
  }, [userId, apiEmuladorNotificacoes]);

  // Função de renderização de cada item
  const renderItem = ({ item }) => (
    <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 10, borderRadius: 5, marginVertical: 10 }}>
      <Text style={[styles.DMSansBold, { color: theme.textColor, fontSize: 18 }]}>{item.empresa?.nomeEmpresa}</Text>
      <Text style={[styles.DMSansRegular, { color: theme.textColor, fontSize: 13 }]}>
        A empresa aprovou sua candidatura na vaga: {item.vagas?.nomeVaga}.
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
            data={notifications} // Dados a serem exibidos
            keyExtractor={(item) => item.idNotificacao.toString()} // Chave única para cada item
            renderItem={renderItem} // Função para renderizar cada item
            contentContainerStyle={{ paddingHorizontal: 20 }} // Estilo do conteúdo da lista
          />
        )}
      </View>
    </SafeAreaView>
  );
}
