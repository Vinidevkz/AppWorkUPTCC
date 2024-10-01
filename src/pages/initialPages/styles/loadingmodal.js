import React from 'react';
import { View, ActivityIndicator, StyleSheet } from 'react-native';

const LoadingModal = ({ loading }) => {
  if (!loading) return null;

  return (
    <View style={styles.overlay}>
      <ActivityIndicator size="large" color="#ffffff" />
    </View>
  );
};

const styles = StyleSheet.create({
  overlay: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
    backgroundColor: 'rgba(0, 0, 0, 0.5)', // Fundo escuro
    alignItems: 'center',
    justifyContent: 'center',
    zIndex: 999, // Certifique-se de que está acima de outros componentes
  },
});

export default LoadingModal;
