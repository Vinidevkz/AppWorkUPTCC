import React, { useState, useContext, useEffect } from "react";
import {
  View,
  Text,
  ActivityIndicator,
  SafeAreaView,
  ScrollView,
  StatusBar,
  FlatList,
  TouchableOpacity,
} from "react-native";
import { Context } from "../pages/initialPages/context/provider";
import ApisUrls from "../ApisUrls/apisurls.js";
import styles from "../styles/vagas.js";
import { useTheme } from "../pages/initialPages/context/themecontext";

export default function MinhasVagas({ navigation }) {
  const { theme } = useTheme({ MinhasVagas });
  const { userId, setVagaID } = useContext(Context);
  const { apiNgrokMinhasVagas } = ApisUrls;

  const [dadosUser, setDadosUser] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  // Função para buscar as vagas do usuário
  const fetchUserData = async () => {
    setLoading(true);
    setError(null);

    // Alterar a URL para usar o idUsuario na rota
    const apiUrl = `${apiNgrokMinhasVagas}/${userId}`; // Alterado para incluir o idUsuario na URL
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

  const renderItem = ({ item }) => (
    <View
      style={{
        backgroundColor: theme.backgroundColorNavBar,
        marginVertical: 10,
        paddingHorizontal: 10,
        paddingVertical: 15,
        borderRadius: 15,
        elevation: 3,
        flexDirection: "row",
        alignItems: "center",
        justifyContent: "space-between",
      }}
    >
      <View>
        <Text
          style={{
            color: theme.textColor,
            fontFamily: "DMSans-Bold",
            fontSize: 18,
          }}
        >
          {item.vaga.nomeVaga}
        </Text>
        <Text
          style={{
            color: theme.textColor,
            fontFamily: "DMSans-Bold",
            fontSize: 15,
          }}
        >
          {item.vaga.cidadeVaga} • {item.vaga.estadoVaga}
        </Text>
        <Text style={{ color: theme.textColor }}>{item.vaga.nomeEmpresa}</Text>
        <Text style={{ color: item.status?.tipoStatusVaga === "Chamado" ? '#20dd77' : '#ff5447' }}>{item.status?.tipoStatusVaga}</Text>
      </View>

      <TouchableOpacity
        style={[styles.button, styles.buttonVaga]}
        onPress={() => {
          setVagaID(item.idVaga);
          navigation.navigate("Vagas");
        }}
      >
        <Text style={[styles.buttonText, styles.DMSansBold]}>Ver Vaga</Text>
      </TouchableOpacity>
    </View>
  );

  return (
    <SafeAreaView
      style={[styles.SafeAreaView, { backgroundColor: theme.backgroundColor }]}
    >
      <StatusBar
        backgroundColor={theme.statusBarBackground}
        barStyle={theme.statusBarColor}
      />
      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar },
        ]}
      >
        <Text
          style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}
        >
          Minhas Vagas:
        </Text>
      </View>
      <FlatList
        data={dadosUser}
        renderItem={renderItem}
        keyExtractor={(item) => item.idVaga.toString()}
        contentContainerStyle={{ padding: 10 }}
        ListEmptyComponent={() =>
          !loading && (
            <Text
              style={{
                color: theme.textColor,
                textAlign: "center",
                marginTop: 20,
              }}
            >
              Nenhuma vaga encontrada
            </Text>
          )
        }
      />
    </SafeAreaView>
  );
}
