import React, { useState, useEffect } from 'react'; 
import { View, Text, TextInput, SafeAreaView, ActivityIndicator, FlatList, Image } from 'react-native'; 
import * as Font from 'expo-font'; 
import { useTheme } from '../pages/initialPages/context/themecontext'; 
import ApisUrls from '../ApisUrls/apisurls.js'; 
import axios from 'axios'; 
import FontAwesome from '@expo/vector-icons/FontAwesome';  
import styles from '../styles/search.js';

const { apiEmuladorVaga } = ApisUrls;

export default function Search() {      
    const { theme } = useTheme({ Search });       
    const [data, setData] = useState([]); 
    const [searchText, setSearchText] = useState('');
    const [loading, setLoading] = useState(false); 
    const [fontsLoaded, setFontsLoaded] = useState(false); 
    const [debounceTimeout, setDebounceTimeout] = useState(null);

    const buscaVaga = async (query) => {       
        setLoading(true);       
        try {         
            const response = await axios.get(`${apiEmuladorVaga}?search=${query}`); 
            setData(response.data);       
        } catch (error) {         
            console.error("Error fetching data:", error);       
        } finally {         
            setLoading(false);       
        }     
    };        

    useEffect(() => {       
        const loadFonts = async () => {         
            await Font.loadAsync({           
                "DMSans-Regular": require("../../assets/fonts/DMSans-Regular.ttf"),           
                "DMSans-Bold": require("../../assets/fonts/DMSans-Bold.ttf"),         
            });         
            setFontsLoaded(true);       
        };          
        loadFonts();     
    }, []);      

    if (!fontsLoaded) { 
        return (
            <View style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
                <ActivityIndicator size="large" color="#20dd77" />
            </View>
        );     
    }    

    const renderPlaceholder = () => (
        <View style={{ alignItems: 'center', justifyContent: 'center', marginBottom: 200 }}>
            <Image
                source={require('../../assets/img/img2.png')}
                style={{ width: 150, height: 250, alignSelf: 'center' }}
            />
            <Text style={{ color: theme.textColor, fontFamily: 'DMSans-Regular' }}>Busque por algo...</Text>
        </View>
    );

    const handleSearch = (text) => {
        setSearchText(text);

        // Debounce para evitar chamadas excessivas à API
        if (debounceTimeout) clearTimeout(debounceTimeout);

        const timeout = setTimeout(() => {
            if (text.length > 1) { // Apenas busca se houver mais de uma letra
                buscaVaga(text);
            } else {
                setData([]); // Limpa os dados se o texto tiver uma letra ou menos
            }
        }, 300);

        setDebounceTimeout(timeout);
    };

    return (
        <SafeAreaView style={{ flex: 1 }}>
            <View style={[styles.containerTop, { backgroundColor: theme.backgroundColorNavBar }]}>
                <View style={[styles.searchInput, { backgroundColor: theme.backgroundColorSearchInput }]}>
                    <FontAwesome name="search" size={23} color={theme.iconColorWhite} />
                    <TextInput 
                        placeholder='Pesquise por vagas e empresas...' 
                        style={[styles.DMSansRegular, styles.searchFontSize, { color: theme.textColor }]} 
                        onChangeText={handleSearch} // Usa a nova função handleSearch
                        value={searchText} // Mantém o texto na caixa de entrada
                    />
                </View>
            </View>          
            <View style={{ height: '100%', backgroundColor: theme.backgroundColor,  }}>
                {loading ? (
                    <View style={{ position: 'absolute', top: '50%', left: '50%', transform: [{ translateX: -25 }, { translateY: -25 }] }}>
                        <ActivityIndicator size="large" color="#20dd77" />
                    </View>
                ) : (
                    searchText === '' ? (
                        renderPlaceholder()
                    ) : (

                      <View style={[{alignItems: 'flex-start', padding: 10}]}>
                        <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Vagas:</Text>
                        <FlatList
                            data={data} 
                            keyExtractor={(item) => item.idVaga.toString()}                         
                            renderItem={({ item }) => (
                              <View style={{marginVertical: 10, backgroundColor: '#fff', padding: 10}}>
                                <Text style={[styles.text, styles.DMSansRegular,{ color: theme.textColor }]}>{item.nomeVaga}</Text>
                                <Text style={[styles.text, styles.DMSansRegular,{ color: theme.textColor }]}>{item.area?.nomeArea}</Text>
                              </View>
                            )}
                        />

                        <Text style={[styles.DMSansBold, styles.title, {color: theme.textColor}]}>Empresas:</Text>
                        <FlatList
                            data={data} 
                            keyExtractor={(item) => item.idVaga.toString()}                         
                            renderItem={({ item }) => (
                                <Text style={{ color: theme.textColor }}>{item.nomeEmpresa}</Text>
                            )}
                        />
                      </View>
                    )
                )}
            </View>      
        </SafeAreaView>   
    ); 
}
