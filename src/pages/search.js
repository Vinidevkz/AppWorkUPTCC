import React from 'react';
import { View, Text, TextInput, SafeAreaView, ScrollView } from 'react-native';

import styles from '../styles/search.js'

export default function Search() {
  return (
    <SafeAreaView>
      <View style={styles.containerTop}>
        <View styles={styles.searchInput}>
         <TextInput placeholder='Pesquise por vagas e empresas...' />
        </View>
      </View>
    </SafeAreaView>
  );
}
