import React from 'react';
import { View, Text, StyleSheet, SafeAreaView, ScrollView } from 'react-native';

import styles from '../styles/notifications.js'

export default function Notifications() {
  return (
    <SafeAreaView>
      <View style={styles.containerTop}>
        <Text style={[styles.DMSansBold, styles.title]}>Notificações:</Text>
      </View>
      <View style={{height: '90%', alignItems: 'center', justifyContent: 'center'}}>
        <Text>Nenhuma notificação</Text>
      </View>
    </SafeAreaView>
  );
}

