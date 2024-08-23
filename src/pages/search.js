import React from 'react';
import { View, Text, StyleSheet } from 'react-native';

export default function Search() {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Pesquisa</Text>
      <Text style={styles.subtitle}>Essa é uma tela simples.</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1, 
    justifyContent: 'center', 
    alignItems: 'center', 
    backgroundColor: '#fff', // Fundo branco
  },
  title: {
    fontSize: 24, 
    fontWeight: 'bold',
    marginBottom: 10,
  },
  subtitle: {
    fontSize: 16,
    color: '#666',
  },
});

  // const [vaga, setVaga] = useState("");
  // const [loading, setLoading] = useState(true);

  // const getVagas = async (vagas) => {

  //   try {
  //     const response = await fetch(`URL DA API`);
  //     const json = await response.json();
  //       setVaga(json);
  //   } catch (error) {
  //     console.error(error);
  //   }
  // };

  // const vagas = ({ item }) => {
  //   <View style={styles.vagaCont}>
  //     <Text style={styles.titleVaga}>{item.tituloVaga}</Text>{" "}
  //     <Text style={styles.descVaga}>{item.vagaDesc}</Text>{" "}
  //   </View>;
  // };
