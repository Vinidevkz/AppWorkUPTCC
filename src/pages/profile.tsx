import React from 'react';
import { View, Text, StyleSheet } from 'react-native';

import styles from '../styles/profile'

export default function SimpleScreen() {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Bem-vindo ao React Native!</Text>
      <Text style={styles.subtitle}>Essa é uma tela simples.</Text>
    </View>
  );
}
