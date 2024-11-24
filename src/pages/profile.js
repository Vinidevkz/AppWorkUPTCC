import React, { useState, useContext, useEffect } from "react";
import {
  View,
  Text,
  Image,
  ScrollView,
  SafeAreaView,
  TouchableOpacity,
  ActivityIndicator,
  FlatList,
  TextInput,
  Alert
} from "react-native";
import { Context } from "../pages/initialPages/context/provider";
import { useTheme } from "../pages/initialPages/context/themecontext";
import Octicons from "@expo/vector-icons/Octicons";
import Entypo from "@expo/vector-icons/Entypo";
import AntDesign from "@expo/vector-icons/AntDesign";
import styles from "../styles/profile";
import ApisUrls from "../ApisUrls/apisurls.js";
import { useFocusEffect } from "@react-navigation/native";
import MaterialCommunityIcons from "@expo/vector-icons/MaterialCommunityIcons";

import axios from 'axios';


import Modal from "react-native-modal";

export default function Profile({ navigation }) {
  const { theme } = useTheme({ Profile });
  const { userId } = useContext(Context);
  const [dadosUser, setDadosUser] = useState([]);

  const [loading, setLoading] = useState(true)

  const [skill1Usuario, setSkill1Usuario] = useState("");
  const [skill2Usuario, setSkill2Usuario] = useState("");
  const [skill3Usuario, setSkill3Usuario] = useState("");
  const [skill4Usuario, setSkill4Usuario] = useState("");
  const [skill5Usuario, setSkill5Usuario] = useState("");

  const [modalVisible, setModalVisible] = useState(false);

  const { apiNgrokUsuario, apiNgrokTags } = ApisUrls;

  const skillsUser = [
    skill1Usuario?.trim(),
    skill2Usuario?.trim(),
    skill3Usuario?.trim(),
    skill4Usuario?.trim(),
    skill5Usuario?.trim(),
  ].filter((skill) => skill);

  useFocusEffect(
    React.useCallback(() => {
      async function fetchUserData() {
        const apiUrl = `${apiNgrokUsuario}${userId}`;

        try {
          const response = await fetch(apiUrl);
          if (!response.ok) {
            const errorText = await response.text();
            console.error(`Error: ${response.status} - ${errorText}`);
            return;
          }

          const data = await response.json();
          setDadosUser(data);
        } catch (error) {
          console.error("Error fetching user data:", error);
        }
      }

      setLoading(false)

      if (userId) {
        fetchUserData();
      }
    }, [userId])
  );

  // Atualiza os states das habilidades quando `dadosUser` é carregado
  useEffect(() => {
    if (dadosUser) {
      setSkill1Usuario(dadosUser.skillUsuario || "");
      setSkill2Usuario(dadosUser.skill2Usuario || "");
      setSkill3Usuario(dadosUser.skill3Usuario || "");
      setSkill4Usuario(dadosUser.skill4Usuario || "");
      setSkill5Usuario(dadosUser.skill5Usuario || "");
    }
  }, [dadosUser]);

  async function alterarTags() {
    const TagsAtualizadas = {
      skillUsuario: skill1Usuario,
      skill2Usuario: skill2Usuario,
      skill3Usuario: skill3Usuario,
      skill4Usuario: skill4Usuario,
      skill5Usuario: skill5Usuario,
    };
  
    console.log(TagsAtualizadas);
  
    const rota = `${apiNgrokTags}/${userId}`;
    console.log(rota);
  
    try {
      const response = await fetch(rota, {
        method: "PUT",  // Certifique-se de que é PUT
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(TagsAtualizadas),  // Enviar os dados no corpo da requisição
      });
  
      if (response.ok) { // Verificar se a resposta foi bem-sucedida
        const updatedData = await response.json();
        setDadosUser(updatedData);
        toggleModal();
        Alert.alert('Habilidades atualizadas com sucesso!');
      } else {
        console.error('Erro inesperado:', await response.text());
      }
    } catch (error) {
      console.error('Erro ao configurar a requisição:', error);
    }
  }
  


  const toggleModal = () => {
    setModalVisible(!modalVisible);
  };
  return (
    <SafeAreaView style={{backgroundColor: theme.backgroundColor}}>
      <View
        style={[
          styles.containerTop,
          { backgroundColor: theme.backgroundColorNavBar },
        ]}
      >
        <Text
          style={[styles.DMSansBold, styles.title, { color: theme.textColor }]}
        >
          Meu Currículo 
        </Text>
        <TouchableOpacity onPress={() => navigation.navigate("Configurações")}>
         <Entypo name="menu" size={40} color={theme.textColor} />
        </TouchableOpacity>
      </View>
      <ScrollView contentContainerStyle={[styles.scrollViewContent, {backgroundColor: theme.backgroundColor}]}>
        <View style={{ width: "100%", backgroundColor: theme.backgroundColor }}>
          <View style={styles.profileBackgroundImageCont}>
            <Image
              source={
                dadosUser.fotoBanner
                  ? { uri: dadosUser.fotoBanner }
                  : require("../../assets/icons/profilebgempty.png")
              }
              style={styles.profileBackgroundImg}
            />

            <View
              style={[
                styles.profileIconBox,
                { borderColor: theme.borderColor },
              ]}
            >
              <Image
                source={dadosUser.fotoUsuario ? { uri: dadosUser.fotoUsuario } : require("../../assets/icons/manicon.jpg")}
                style={styles.icon}
              />
            </View>
          </View>

          <View
            style={[
              styles.profileCont,
              { backgroundColor: theme.backgroundColor },
            ]}
          >
            <View style={styles.profileHeader}>
              <View>
                <Text
                  style={[
                    styles.DMSansBold,
                    styles.profileName,
                    { color: theme.textColor },
                  ]}
                >
                  {dadosUser.nomeUsuario || <ActivityIndicator size={'small'} color={"#20dd77"}/>}
                </Text>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.profileUserName,
                    { color: theme.textColor },
                  ]}
                >
                  @{dadosUser.usernameUsuario || <ActivityIndicator size={'small'} color={"#20dd77"}/>}
                </Text>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.profileUserLocation,
                    { color: theme.textColor },
                  ]}
                >
                  {dadosUser.cidadeUsuario  || <ActivityIndicator size={'small'} color={"#20dd77"}/>} - {dadosUser.estadoUsuario || <ActivityIndicator size={'small'} color={"#20dd77"}/>}
                </Text>
              </View>
            </View>

            <View style={[styles.profileBioCont, {flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between'}]}>
              <View style={{width: 250}}>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.text,
                    { color: theme.textColor },
                  ]}
                >
                  {dadosUser.sobreUsuario || <ActivityIndicator size={'small'} color={"#20dd77"}/>}
                </Text>
              </View>

              <View style={{borderRadius: 20, borderWidth: 2, borderColor: '#20dd77', padding: 10, marginRight: 10}}>
                <Text
                      style={[
                        styles.DMSansRegular,
                        styles.text,
                        { color: theme.textColor },
                      ]}
                    >
                      #{dadosUser.areaInteresseUsuario || <ActivityIndicator size={'small'} color={"#20dd77"}/>}
                </Text>
              </View>
            </View>

            <View style={{ width: '100%', gap: 20}}>
              <View style={{flexDirection: 'row', alignItems: 'center', gap: 5 }}>
                <MaterialCommunityIcons name="star-four-points-outline" size={20} color={theme.textColor} />
                <Text style={[styles.title, styles.DMSansRegular, {color: theme.textColor, alignItems: 'center'}]}>Habilidades :</Text>


              </View>

              {loading ? (
  <ActivityIndicator size="small" color="#20dd77" />
) : (
  <>
    {dadosUser.skillUsuario || dadosUser.skill2Usuario || dadosUser.skill3Usuario || dadosUser.skill5Usuario || dadosUser.skill5Usuario ? (
      <View style={{alignItems: 'center', justifyContent: 'space-between', flexDirection: 'row'}}>
        <FlatList
          data={skillsUser} // Passa o array de habilidades para a FlatList
          keyExtractor={(item, index) => index.toString()} // Define a chave para cada item
          horizontal={true} // Renderiza horizontalmente
          showsHorizontalScrollIndicator={false} // Oculta a barra de rolagem
          renderItem={({ item }) => (
            <View style={{backgroundColor: theme.textColor, borderRadius: 20, paddingHorizontal: 10, paddingVertical: 5, alignItems: 'center', justifyContent: 'center', marginHorizontal: 5}}>
              <Text style={[styles.text, {color: theme.backgroundColorItens}]}>#{item}</Text>
            </View>
          )}
          contentContainerStyle={styles.listContainer}
        />
        <TouchableOpacity style={{marginHorizontal: 15}} onPress={() => toggleModal()}>
          <AntDesign name="pluscircleo" size={30} color="#20dd77" />
        </TouchableOpacity>
      </View>
    ) : (
      <View style={{gap: 10, alignItems: 'center', justifyContent: 'center'}}>
        <Text style={[styles.DMSansRegular, {color: theme.textColor, alignSelf: 'center', width: '100%', textAlign: 'center'}]}>
          Parece que você ainda não adicionou nenhuma habilidade.
        </Text>
        <TouchableOpacity style={{borderWidth: 2, borderColor: '#20dd77', padding: 10, borderRadius: 50, alignItems: 'center', justifyContent: 'center'}} onPress={() => toggleModal()}>
          <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>
            Adicionar Habilidades <Entypo name="plus" size={15} color={theme.textColor} />
          </Text>
        </TouchableOpacity>
      </View>
    )}
  </>
)}



            </View>

            <View style={[styles.line, { borderColor: theme.lineColor }]}>
            </View>

            <View
              style={{
                paddingVertical: 10,
                gap: 30,
                borderRadius: 20,
              }}
            >
              <View style={styles.profileSkillsCont}>
                <Text
                  style={[
                    styles.DMSansBold,
                    styles.title,
                    { color: theme.textColor, fontSize: 19, borderBottomWidth: 1, borderColor: '#c4c4c4' },
                  ]}
                >
                  Formação Acadêmica:
                </Text>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.text,
                    { color: theme.textColor },
                  ]}
                >
                  <Text style={styles.DMSansBold}>Ensino Médio:</Text> {dadosUser.ensinoMedio ? <Text>{dadosUser.ensinoMedio}, {dadosUser.anoFormacao}</Text> : <Text>Incompleto</Text>}
                </Text>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.text,
                    { color: theme.textColor },
                  ]}
                >
                  <Text style={styles.DMSansBold}>Cursos Complementares:</Text>{"\n"}{dadosUser.formacaoCompetenciaUsuario}
                </Text>
                <Text
                  style={[
                    styles.DMSansRegular,
                    styles.text,
                    { color: theme.textColor },
                  ]}
                >
                  <Text style={styles.DMSansBold}>Lingua estrangeira:</Text>{"\n"}{dadosUser.linguaUsuario ? <Text>{dadosUser.linguaUsuario}</Text> : <Text>Nenhuma</Text>}
                </Text>
              </View>

              <View style={styles.profileLinksCont}>
                <Text
                  style={[
                    styles.DMSansBold,
                    styles.title,
                    { color: theme.textColor, fontSize: 19, borderBottomWidth: 1, borderColor: '#c4c4c4' },
                  ]}
                >
                  Contatos:
                </Text>
                <View style={styles.linkLine}>
                  <Text
                    style={[
                      styles.DMSansBold,
                      styles.linkTitle,
                      { color: theme.textColor },
                    ]}
                  >
                    Telefone:{" "}
                  </Text>
                  <Text
                    style={[
                      styles.DMSansRegular,
                      styles.linkText,
                      { color: theme.textColor },
                    ]}
                  >
                    {dadosUser?.contatoUsuario || <ActivityIndicator size={'small'} color={"#20dd77"}/>}
                  </Text>
                </View>
                <View style={styles.linkLine}>
                  <Text
                    style={[
                      styles.DMSansBold,
                      styles.linkTitle,
                      { color: theme.textColor },
                    ]}
                  >
                    Email:{" "}
                  </Text>
                  <Text
                    style={[
                      styles.DMSansRegular,
                      styles.linkText,
                      { color: theme.textColor },
                    ]}
                  >
                    {dadosUser?.emailContato || <ActivityIndicator size={'small'} color={"#20dd77"}/>}
                  </Text>
                </View>
                
              </View>
            </View>

            <Modal isVisible={modalVisible} onBackdropPress={toggleModal}>
              <View style={{ backgroundColor: theme.backgroundColorNavBar, padding: 20, borderRadius: 10 }}>
                <View style={{gap: 10}}>
                 <Text style={[styles.DMSansBold, {color: theme.textColor, fontSize: 16}]}>Nos conte suas habilidades!</Text>
                 <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Adicione tags com suas principais habilidades adquiridas durante seus estudos, como, por exemplo: #Excel, #AnáliseDeDados.</Text>

                 <View style={{gap: 15}}>
                    <View style={[{alignItems: 'center', flexDirection: 'row', width: 280, gap: 10}]}>
                      <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Hab. 1: </Text>

                      <TextInput
                      placeholder="escreva aqui sua habilidade"
                      placeholderTextColor={theme.placeholderColor}
                      maxLength={50}
                      style={[{backgroundColor: theme.backgroundColor, borderRadius: 20, width: '100%', paddingHorizontal: 10, color: theme.textColor}]}
                      value={skill1Usuario}
                      onChangeText={(text) => setSkill1Usuario(text)}
                      />
                    </View>

                    <View style={[{alignItems: 'center', flexDirection: 'row', width: 280, gap: 10}]}>
                      <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Hab. 2: </Text>

                      <TextInput
                      placeholder="escreva aqui sua habilidade"
                      placeholderTextColor={theme.placeholderColor}
                      maxLength={50}
                      style={[{backgroundColor: theme.backgroundColor, borderRadius: 20, width: '100%', paddingHorizontal: 10, color: theme.textColor}]}
                      value={skill2Usuario}
                      onChangeText={(text) => setSkill2Usuario(text)}
                      />
                    </View>

                    <View style={[{alignItems: 'center', flexDirection: 'row', width: 280, gap: 10}]}>
                      <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Hab. 3: </Text>

                      <TextInput
                      placeholder="escreva aqui sua habilidade"
                      placeholderTextColor={theme.placeholderColor}
                      maxLength={50}
                      style={[{backgroundColor: theme.backgroundColor, borderRadius: 20, width: '100%', paddingHorizontal: 10, color: theme.textColor}]}
                      value={skill3Usuario}
                      onChangeText={(text) => setSkill3Usuario(text)}
                      />
                    </View>

                    <View style={[{alignItems: 'center', flexDirection: 'row', width: 280, gap: 10}]}>
                      <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Hab. 4: </Text>

                      <TextInput
                      placeholder="escreva aqui sua habilidade"
                      placeholderTextColor={theme.placeholderColor}
                      maxLength={50}
                      style={[{backgroundColor: theme.backgroundColor, borderRadius: 20, width: '100%', paddingHorizontal: 10, color: theme.textColor}]}
                      value={skill4Usuario}
                      onChangeText={(text) => setSkill4Usuario(text)}
                      />
                    </View>

                    <View style={[{alignItems: 'center', flexDirection: 'row', width: 280, gap: 10}]}>
                      <Text style={[styles.DMSansRegular, {color: theme.textColor}]}>Hab. 5: </Text>

                      <TextInput
                      placeholder="escreva aqui sua habilidade"
                      placeholderTextColor={theme.placeholderColor}
                      maxLength={50}
                      style={[{backgroundColor: theme.backgroundColor, borderRadius: 20, width: '100%', paddingHorizontal: 10, color: theme.textColor}]}
                      value={skill5Usuario}
                      onChangeText={(text) => setSkill5Usuario(text)}
                      />
                    </View>
                 </View>
                </View>

                <View style={{ flexDirection: "row", alignItems: "center", justifyContent: "space-between", paddingHorizontal: 15 }}>
                  <TouchableOpacity style={{ marginTop: 20 }} onPress={() => toggleModal()}>
                    <Text style={[styles.buttonText, styles.DMSansRegular, { color: theme.textColor }]}>Fechar</Text>
                  </TouchableOpacity>

                  <TouchableOpacity style={{ marginTop: 20, backgroundColor: '#20dd77', borderRadius: 30, width: 100, alignItems: "center", justifyContent: "center", padding: 10 }} onPress={alterarTags}>
                    <Text style={[styles.buttonText, styles.DMSansRegular, { color: '#f4f4f4' }]}>Enviar</Text>
                  </TouchableOpacity>
                </View>
              </View>
            </Modal>

          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}
