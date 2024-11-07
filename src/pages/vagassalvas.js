import React, { useState, useContext, useEffect } from "react";
import { View, Text, ActivityIndicator, SafeAreaView, ScrollView, StatusBar, FlatList, TouchableOpacity } from "react-native";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
import styles from "../styles/vagas.js";
import { useTheme } from "../pages/initialPages/context/themecontext";

export default function VagasSalvas({ navigation }) {
  const { theme } = useTheme({ VagasSalvas });
  const { userId, setVagaID } = useContext(Context);
  const { apiNgrokPegarVagasSalvas } = ApisUrls;

  const [dadosVaga, setDadosVaga] = useState([]);
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
        setDadosVaga(data);
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
      <StatusBar backgroundColor={theme.statusBarBackground} barStyle={theme.statusBarColor} />
      <ScrollView
        style={{
          flex: 1,
          gap: 50,
          backgroundColor: theme.backgroundColor,
        }}
      >
        <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
          <Text style={[styles.DMSansBold, styles.title, [{ color: theme.textColor }]]}>Vagas Salvas:</Text>
        </View>

        <FlatList
          data={dadosVaga}
          renderItem={({ item }) => (
            <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 10, margin: 10, borderRadius: 10, flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between' }}>
              <View>
                <Text style={[styles.title, styles.DMSansRegular, { color: theme.textColor }]}>{item.nomeVaga}</Text>
                <Text style={[styles.DMSansRegular, { color: theme.textColor }]}>Cidade: {item.cidadeVaga}</Text>
                <Text style={[styles.DMSansRegular, { color: theme.textColor }]}>Prazo: {item.prazoVaga}</Text>
                <Text style={[styles.DMSansRegular, { color: theme.textColor }]}>Salário: R$ {item.salarioVaga}</Text>
              </View>
              <TouchableOpacity
                style={[styles.button, styles.buttonVaga]}
                onPress={() => {
                setVagaID(item.idVaga);
                navigation.navigate("Vagas");
                }}
              >
                <Text
                  style={[styles.buttonText, styles.DMSansBold, { color: "#fff" }]}
                  onPress={() => {
                    setVagaID(item.idVaga);
                    navigation.navigate("Vagas");
                  }}
                >
                  Ver Vaga
                </Text>
              </TouchableOpacity>
            </View>
          )}
          keyExtractor={(item, index) => index.toString()} // Use index como chave se não houver ID único
          ListEmptyComponent={
            <View style={{flex: 1, alignItems: 'center', justifyContent: 'center', marginVertical: 20}}>
              <Text style={[styles.DMSansRegular, [{ color: theme.textColor }]]}>Você não possuí vagas salvas.</Text>
            </View>
          }
        />
      </ScrollView>
    </SafeAreaView>
  );
}
