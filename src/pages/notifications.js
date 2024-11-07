import React from 'react';
import { View, Text, StyleSheet, SafeAreaView, ScrollView } from 'react-native';
import { useTheme } from "../pages/initialPages/context/themecontext";
import { useState } from 'react';

import styles from '../styles/notifications.js'

export default function Notifications() {
  const { theme, toggleTheme } = useTheme({Notifications});
  return (
    <SafeAreaView>
      <View style={[styles.containerTop, {backgroundColor: theme.backgroundColorNavBar}]}>
        <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Notificações:</Text>
      </View>
      <View style={{height: '100%', paddingBottom: 150, alignItems: 'center', justifyContent: 'center', backgroundColor: theme.backgroundColor}}>
        <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Nenhuma notificação</Text>
      </View>
    </SafeAreaView>
  );
}

