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
import { TextInputMask } from 'react-native-masked-text';
import Ionicons from '@expo/vector-icons/Ionicons';
import AntDesign from '@expo/vector-icons/AntDesign';
import styles from '../styles/profilechange.js';
import ApisUrls from '../ApisUrls/apisurls.js';

export default function ProfileChange({ navigation }) {
  const { theme } = useTheme();
  const {
    userId,
    setNome,
    setUserName,
    setBio,
    setAreaInt,
    areaInt,
    setNasc,
    nasc,
    setFormacaoUsuario,
    setTel
  } = useContext(Context);

  const [areaVagas, setAreaVagas] = useState([]);
  const [dadosUser, setDadosUser] = useState({});
  const [nomeUsuarioAlterado, setNomeUsuarioAlterado] = useState('');
  const [userNameAlterado, setUsernameAlterado] = useState('');
  const [sobreUsuarioAlterado, setSobreUsuarioAlterado] = useState('');
  const [nascUsuarioAlterado, setNascUsuarioAlterado] = useState('');
  const [areaIntUsuarioAlterado, setAreaIntUsuarioAlterado] = useState('');
  const [formacaoCompetenciaUsuarioAlterado, setFormacaoCompetenciaUsuarioAlterado] = useState('');
  const [telAlterado, setTelAlterado] = useState('');

  const { apiNgrokArea, apiNgrokUsuario, apiNgrokAlterar, apiEmuladorUsuario, apiEmuladorArea } = ApisUrls;

  useEffect(() => {
    async function fetchUserData() {
      const apiUrl = `${apiEmuladorUsuario}${userId}`;
      try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        setDadosUser(data);

        // Converte a data para o formato DD/MM/YYYY
        const formattedDate = convertDateToDDMMYYYY(data.nascUsuario);
        
        setNomeUsuarioAlterado(data.nomeUsuario || '');
        setUsernameAlterado(data.usernameUsuario || '');
        setSobreUsuarioAlterado(data.sobreUsuario || '');
        setNascUsuarioAlterado(formattedDate || ''); // Usando a data formatada
        setAreaIntUsuarioAlterado(data.areaInt || ''); // Definindo a área de interesse atual
        setFormacaoCompetenciaUsuarioAlterado(data.formacaoCompetenciaUsuario || '');
        setTelAlterado(data.contatoUsuario || '');
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
        const response = await fetch(apiEmuladorArea);
        const data = await response.json();
        setAreaVagas(data);
      } catch (error) {
        console.error('Erro ao buscar áreas de vagas:', error);
      }
    }

    pegarAreaVaga();
  }, []);

  // Função para converter data do formato YYYY-MM-DD para DD/MM/YYYY
  function convertDateToDDMMYYYY(dateString) {
    if (!dateString) return '';
    const [year, month, day] = dateString.split('-');
    return `${day}/${month}/${year}`;
  }

  function formatDateToISO(dateString) {
    if (!dateString) {
      return ''; // Retorne uma string vazia se a data não for fornecida
    }

    const [day, month, year] = dateString.split('/');

    // Verifique se todos os componentes da data estão presentes
    if (!day || !month || !year) {
      return ''; // Retorne uma string vazia ou uma data padrão se algum componente estiver ausente
    }

    // Formate a data no formato ISO esperado pelo backend
    return `${year}-${month}-${day}`;
  }

  const alterarUsuario = async () => {
    if (!nomeUsuarioAlterado.trim() || !userNameAlterado.trim() || !sobreUsuarioAlterado.trim() || !areaIntUsuarioAlterado.trim() || !nascUsuarioAlterado.trim() || !formacaoCompetenciaUsuarioAlterado.trim() || !telAlterado.trim()) {
      Alert.alert('Erro', 'Por favor, preencha todos os campos obrigatórios.');
      return;
    }

    const formattedDate = formatDateToISO(nascUsuarioAlterado);
    
    console.log('Data formatada:', formattedDate); // Adicione um log para verificar a data formatada
    
    if (!formattedDate) {
      Alert.alert('Erro', 'Data de nascimento é obrigatória.');
      return;
    }

    const apiUrl = `${apiEmuladorUsuario}${userId}`;
    try {
      const response = await fetch(apiUrl, {
        method: 'PUT',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          nomeUsuario: nomeUsuarioAlterado,
          usernameUsuario: userNameAlterado,
          sobreUsuario: sobreUsuarioAlterado,
          nascUsuario: formattedDate, // Enviando a data no formato correto
          areaInteresseUsuario: areaIntUsuarioAlterado,
          formacaoCompetenciaUsuario: formacaoCompetenciaUsuarioAlterado,
          contatoUsuario: telAlterado,
        }),
      });

      const jsonResponse = await response.json();
      
      if (response.ok) {
        Alert.alert('Sucesso', 'Dados atualizados com sucesso');
        // Atualize os valores do contexto após a atualização
        setNome(nomeUsuarioAlterado);
        setUserName(userNameAlterado);
        setBio(sobreUsuarioAlterado);
        setNasc(nascUsuarioAlterado);
        setAreaInt(areaIntUsuarioAlterado);
        setFormacaoUsuario(formacaoCompetenciaUsuarioAlterado);
        setTel(telAlterado);
      } else {
        Alert.alert('Erro', jsonResponse.message || 'Erro ao atualizar dados');
        console.log(jsonResponse.message);
      }
    } catch (error) {
      Alert.alert('Erro', 'Erro ao se comunicar com o servidor');
      console.error(error);
    }
  };

  return (
    <SafeAreaView style={{ height: '100%', backgroundColor: theme.backgroundColor }}>
      <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
        <View style={{ alignItems: 'center', flexDirection: 'row', gap: 20 }}>
          <TouchableOpacity onPress={() => navigation.goBack()}>
            <Ionicons name="caret-back-circle-sharp" size={35} color={theme.iconColorWhite} />
          </TouchableOpacity>
          <Text style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}>
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
          <Text style={{ color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18 }}>
            Nome:
          </Text>
          <TextInput
            style={[styles.textInput, styles.DMSansRegular, { color: theme.textColor }]}
            value={nomeUsuarioAlterado}
            onChangeText={(text) => setNomeUsuarioAlterado(text)}
          />
        </View>
        <View style={styles.changeCont}>
          <Text style={{ color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18 }}>
            Nome de usuário:
          </Text>
          <View style={[styles.textInput, styles.DMSansRegular, { flexDirection: 'row', alignItems: 'center', gap: 5, color: theme.textColor }]}>
            <Text style={{ borderRightWidth: 1, borderColor: theme.textColor, padding: 3, color: theme.textColor }}>@</Text>
            <TextInput
              style={{ flex: 1, color: theme.textColor }}
              value={userNameAlterado}
              onChangeText={(text) => setUsernameAlterado(text)}
            />
          </View>
        </View>
        <View style={styles.changeCont}>
          <Text style={{ color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18 }}>
            Biografia:
          </Text>
          <TextInput
            style={[styles.textInput, styles.DMSansRegular, { color: theme.textColor }]}
            value={sobreUsuarioAlterado}
            onChangeText={(text) => setSobreUsuarioAlterado(text)}
            multiline={true}
            textAlignVertical="top"
          />
        </View>
        <View style={styles.changeCont}>
          <Text style={{ color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18 }}>
            Data de Nascimento:
          </Text>
          <TextInputMask
            type={'datetime'}
            value={nascUsuarioAlterado}
            options={{
              format: 'DD/MM/YYYY', // Exibição no formato DD/MM/YYYY
            }}
            placeholder="DD/MM/YYYY"
            placeholderTextColor={'#909090'}
            style={[styles.DMSansRegular, styles.textInput, { color: theme.textColor }]}
            onChangeText={(text) => {
              console.log('Valor da data:', text); // Adicione um log para verificar o valor da data
              setNascUsuarioAlterado(text);
            }}
          />
        </View>
        <View style={styles.changeCont}>
          <Text style={{ color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18 }}>
            Área de Interesse:
          </Text>
          <Picker
            selectedValue={areaIntUsuarioAlterado}
            style={[styles.inputCont, styles.text, styles.DMSansRegular, { color: theme.textColor }]}
            onValueChange={(itemValue) => setAreaIntUsuarioAlterado(itemValue)}
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
          <Text style={{ color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18 }}>
            Competência:
          </Text>
          <TextInput
            style={[styles.textInput, styles.DMSansRegular, { color: theme.textColor }]}
            value={formacaoCompetenciaUsuarioAlterado}
            onChangeText={(text) => setFormacaoCompetenciaUsuarioAlterado(text)}
          />
        </View>
        <View style={styles.changeCont}>
          <Text style={{ color: theme.textColor, fontFamily: 'DMSans-Regular', fontSize: 18 }}>
            Contatos:
          </Text>
          <View style={styles.contactCont}>
            <Text style={[styles.DMSansRegular, { color: theme.textColor, fontSize: 16 }]}>
              Telefone:
            </Text>
            <TextInput
              style={[styles.contactInput, styles.DMSansRegular, { color: theme.textColor }]}
              value={telAlterado}
              onChangeText={(text) => setTelAlterado(text)}
            />
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
