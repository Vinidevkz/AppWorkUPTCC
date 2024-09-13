import React, { useEffect, useState, useContext } from 'react';
import {
  View,
  Text,
  SafeAreaView,
  ScrollView,
  TextInput,
  TouchableOpacity,
  Alert,
} from 'react-native';
import { useTheme } from '../pages/initialPages/context/themecontext';
import { Context } from '../pages/initialPages/context/provider.js';
import { Picker } from '@react-native-picker/picker';
import Ionicons from '@expo/vector-icons/Ionicons';
import AntDesign from '@expo/vector-icons/AntDesign';
import styles from '../styles/profilechange.js';

export default function ProfileChange({ navigation }) {
  const { theme } = useTheme();
  const {
    userId,
    nomeUsuario,
    setNomeUsuario,
    usernameUsuario,
    setUsernameUsuario,
    sobreUsuario,
    setSobreUsuario,
    areaInt,
    setAreaInt,
    formacaoCompetenciaUsuario,
    setFormacaoUsuario,
    tel,
    setTel,
  } = useContext(Context);

  // Verifique se os valores retornados não são undefined
  if (
    typeof setNomeUsuario === 'undefined' ||
    typeof setUsernameUsuario === 'undefined' ||
    typeof setSobreUsuario === 'undefined' ||
    typeof setAreaInt === 'undefined' ||
    typeof setFormacaoUsuario === 'undefined' ||
    typeof setTel === 'undefined'
  ) {
    console.error('Context values are not correctly defined.');
  }

  const [areaVagas, setAreaVagas] = useState([]);
  const [dadosUser, setDadosUser] = useState({});
  const [areaInteresseUsuario, setAreaInteresseUsuario] = useState('');

  const apiEmulador = 'http://10.0.2.2:8000/api/usuario/';
  const apiEmuladorAreas = 'http://10.0.2.2:8000/api/areavaga';
  const apiEmuladorAlterar = 'http://10.0.2.2:8000/api/usuario/';

  useEffect(() => {
    async function fetchUserData() {
      const apiUrl = `${apiEmulador}${userId}`;
      try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        setDadosUser(data);
        console.log('Fetched user data:', data);
      } catch (error) {
        console.error('Error fetching user data:', error);
      }
    }

    if (userId) {
      fetchUserData();
    }
  }, [userId]);

  useEffect(() => {
    async function pegarAreaVaga() {
      try {
        const response = await fetch(apiEmuladorAreas);
        const data = await response.json();
        console.log('Fetched areas:', data);
        setAreaVagas(data);
      } catch (error) {
        console.error('Erro ao buscar áreas de vagas:', error);
      }
    }

    pegarAreaVaga();
  }, []);

  const alterarUsuario = async () => {
    try {
      const response = await fetch(apiEmuladorAlterar, {
        method: 'PUT', // Mudança de 'UPDATE' para 'PUT'
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          nomeUsuario,
          usernameUsuario,
          sobreUsuario,
          areaInt,
          formacaoCompetenciaUsuario,
          tel,
        }),
      });

      const jsonResponse = await response.json();

      if (response.ok) {
        Alert.alert('Sucesso', 'Dados atualizados com sucesso');
      } else {
        Alert.alert('Erro', jsonResponse.message || 'Erro ao atualizar dados');
      }
    } catch (error) {
      Alert.alert('Erro', 'Erro ao se comunicar com o servidor');
      console.error(error);
    }
  };

  return (
    <SafeAreaView
      style={{ height: '100%', backgroundColor: theme.backgroundColor }}
    >
      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar },
        ]}
      >
        <View style={{ alignItems: 'center', flexDirection: 'row', gap: 20 }}>
          <TouchableOpacity onPress={() => navigation.goBack()}>
            <Ionicons
              name="caret-back-circle-sharp"
              size={35}
              color={theme.iconColorWhite}
            />
          </TouchableOpacity>
          <Text
            style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}
          >
            Alterar Perfil
          </Text>
        </View>

        <TouchableOpacity style={styles.button} onPress={alterarUsuario}>
          <Text style={[styles.DMSansBold, styles.saveText]}>Salvar</Text>
          <AntDesign name="plus" size={15} color="#20dd77" />
        </TouchableOpacity>
      </View>
      <ScrollView
        style={{
          height: '100%',
          padding: 20,
          backgroundColor: theme.backgroundColor,
        }}
      >
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: 'DMSans-Regular',
              fontSize: 18,
            }}
          >
            Nome:
          </Text>
          <TextInput
            style={[
              styles.textInput,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
            value={dadosUser.nomeUsuario || ''}
            onChangeText={(text) => setNomeUsuario(text)}
          />
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: 'DMSans-Regular',
              fontSize: 18,
            }}
          >
            Nome de usuário:
          </Text>
          <TextInput
            style={[
              styles.textInput,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
            value={dadosUser.usernameUsuario || ''}
            onChangeText={(text) => setUsernameUsuario(text)}
          />
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: 'DMSans-Regular',
              fontSize: 18,
            }}
          >
            Biografia:
          </Text>
          <TextInput
            style={[
              styles.textInput,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
            value={dadosUser.sobreUsuario || ''}
            onChangeText={(text) => setSobreUsuario(text)}
          />
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: 'DMSans-Regular',
              fontSize: 18,
            }}
          >
            Área de Interesse:
          </Text>
          <Picker
            selectedValue={areaInt}
            style={[
              styles.inputCont,
              styles.text,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
            onValueChange={(itemValue) => {
              setAreaInt(itemValue);
              setAreaInteresseUsuario(itemValue);
            }}
            mode="dropdown"
          >
            <Picker.Item label="Selecione uma área" value="" />
            {Array.isArray(areaVagas) &&
              areaVagas.map((area, index) => (
                <Picker.Item
                  key={index}
                  label={area.nomeAreaInteresseVaga}
                  value={area.nomeAreaInteresseVaga}
                />
              ))}
          </Picker>
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: 'DMSans-Regular',
              fontSize: 18,
            }}
          >
            Competência:
          </Text>
          <TextInput
            style={[
              styles.textInput,
              styles.DMSansRegular,
              { color: theme.textColor },
            ]}
            value={dadosUser.formacaoCompetenciaUsuario || ''}
            onChangeText={(text) => setFormacaoUsuario(text)}
          />
        </View>
        <View style={styles.changeCont}>
          <Text
            style={{
              color: theme.textColor,
              fontFamily: 'DMSans-Regular',
              fontSize: 18,
            }}
          >
            Contatos:
          </Text>
          <View style={styles.contactCont}>
            <Text
              style={[
                styles.DMSansRegular,
                { color: theme.textColor, fontSize: 16 },
              ]}
            >
              Telefone:
            </Text>
            <TextInput
              style={[
                styles.contactInput,
                styles.DMSansRegular,
                { color: theme.textColor },
              ]}
              value={dadosUser.tel || ''}
              onChangeText={(text) => setTel(text)}
            />
          </View>
          {/* Adicione os campos de Rede 1 e Rede 2 aqui, se necessário */}
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
