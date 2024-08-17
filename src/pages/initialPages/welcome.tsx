import React from 'react';
import { View, Text, Button } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

const Stack = createNativeStackNavigator();
import TabBar from '../routes/tabbar'

function Welcome({ navigation }) {
  return (
    <View>
      <Text>Página Inicial</Text>
      <Button
        title="Ir para Detalhes"
        onPress={() => navigation.navigate('TabBar')}
      />
    </View>
  );
}


export default function App() {
  return (
    <NavigationContainer independent={true}>
      <Stack.Navigator initialRouteName="Welcome">
        <Stack.Screen name="Welcome" component={Welcome} />
        <Stack.Screen name="TabBar" component={TabBar} options={{headerShown: false}}/>
      </Stack.Navigator>
    </NavigationContainer>
  );
}
