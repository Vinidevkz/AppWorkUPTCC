import React from 'react';
import { StyleSheet, Text, View } from 'react-native';

import Ionicons from "@expo/vector-icons/Ionicons";

export default function NotificationModal() {
  return (
    <View style={styles.container}>
        <Ionicons name="bookmark" size={24} color="#20dd77" />
        <Text style={styles.text}>Vaga Salva com Sucesso!</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    position: 'absolute',
    top: 50,
    left: 100,
    alignSelf: 'flex=end',
    alignItems: 'center',
    justifyContent: 'space-between',
    backgroundColor: '#fff',
    padding: 20,
    borderRadius: 10,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.8,
    shadowRadius: 2,
    elevation: 5,
    zIndex: 9999,
    flexDirection: 'row',
  },
  text: {
    fontFamily: 'DMSans-Regular',
    fontSize: 15,
  },
});
