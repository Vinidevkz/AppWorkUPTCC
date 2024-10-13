import React, { useState, useContext, useEffect } from "react";
import {
  View,
  Text,
  ActivityIndicator,
  SafeAreaView,
  ScrollView,
  StatusBar,
} from "react-native";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
import styles from "../styles/vagas.js";
import { useTheme } from "../pages/initialPages/context/themecontext";

export default function MinhasVagas({ navigation }) {
  const { theme } = useTheme({ MinhasVagas });
  const {userId} = useContext(Context);
  const { apiEmuladorPegarVagasSalvas, apiNgrokPegarVagasSalvas } = ApisUrls;

  const [dadosUser, setDadosUser] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  // Função para buscar as vagas do usuário
  const fetchUserData = async () => {
    setLoading(true);
    setError(null);
  
    // Alterar a URL para usar o idUsuario na rota
    const apiUrl = `${apiNgrokPegarVagasSalvas}/${userId}`; // Alterado para incluir o idUsuario na URL
    console.log("Fetching URL:", apiUrl);
  
    try {
      const response = await fetch(apiUrl);
      if (!response.ok) {
        const errorText = await response.text();
        throw new Error(`Error: ${response.status} - ${errorText}`);
      }
  
      const data = await response.json(); // Obtém a resposta como JSON
      if (Array.isArray(data)) {
        setDadosUser(data);
        console.log("Fetched user data:", data);
      } else {
        throw new Error("Data returned is not an array");
      }
    } catch (error) {
      setError(error.message);
      console.error("Error fetching user data:", error);
    } finally {
      setLoading(false);
    }
  };
  

  // useEffect para carregar as vagas ao montar o componente
  useEffect(() => {
    fetchUserData();
  }, [userId]); // Dependência em userId para recarregar se o ID do usuário mudar

  return (
    <SafeAreaView style={styles.SafeAreaView}>
      <StatusBar
        backgroundColor={theme.statusBarBackground}
        barStyle={theme.statusBarColor}
      />
      <ScrollView
        style={{
          flex: 1,
          gap: 50,
          backgroundColor: theme.backgroundColor,
        }}
      >
        <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
          <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>
            Vagas Salvas:
          </Text>
        </View>

        {loading && <ActivityIndicator size="large" color="#20dd77" />}
        {error && <Text style={{ color: 'red' }}>{error}</Text>}
        {dadosUser.length > 0 && (
          <View>
            {dadosUser.map(vaga => (
              <Text key={vaga.id} style={{color: '#fff'}}>
                Vaga ID: {vaga.id}, Vaga: {vaga.idVaga}
              </Text>
            ))}
          </View>
        )}
      </ScrollView>
    </SafeAreaView>
  );
}
