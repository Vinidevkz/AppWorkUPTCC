import { StyleSheet } from 'react-native';

const styles = StyleSheet.create({
  SafeAreaView: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'flex-start',
  },

  DMSansRegular: {
    fontFamily: 'DMSans-Regular',
  },

  DMSansBold: {
    fontFamily: 'DMSans-Bold',
  },

  scrollViewContent: {
    flex: 1,
    paddingBottom: 100, // Ajuste conforme a altura da TabBar
  },

  containerTop: {
    width: '100%',
    height: 80,
    maxHeight: 80,
    backgroundColor: '#fff',
    justifyContent: 'center',
    alignItems: 'center',
    elevation: 10,
    paddingHorizontal: 40
  },

  searchInput: {
    borderRadius: 20,
    paddingVertical: 5,
    width: '100%',
    height: 45,
    paddingLeft: 20,
    overflow: 'hidden',
    backgroundColor: '#f4f4f4',
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
    gap: 10,
  },

  searchFontSize: {
    fontSize: 14,
    flex: 1,
  },

  title: {
    fontSize: 25,
  },

  row: {
    flexDirection: 'row'
  },

  text: {
    fontSize: 16,
  },

  buttonVaga: {
    width: 100,
    paddingVertical: 10,
    borderRadius: 20,
  },

  button: {
    backgroundColor: '#20dd77',
    alignItems: 'center',
    justifyContent: 'center',
    paddingHorizontal: 10,
  },

  postIconBox: {
    borderWidth: 2,
    borderColor: '#808080',
    borderRadius: 50,
    width: 50,
    height: 50,
  },

  postIconImg: {
    width: '100%',
    height: '100%',
    borderRadius: 50,
  },

  profileBackgroundImageCont: {
    width: '100%',
    height: 150,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: '#ccc',
 
    position: 'relative',
    zIndex: 1,
    
  },

  profileIconBox: {
    width: 100,
    height: 100,
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
    borderRadius: 50,
    borderWidth: 2,
    backgroundColor: '#fff',
    zIndex: 1,
    position: 'absolute',
    bottom: -50, // Posiciona a metade do ícone abaixo da imagem de fundo
    left: '36%',
    transform: [{ translateX: 80 }], // Centraliza horizontalmente
  },

  profileBackgroundImg: {
    width: '100%',
    height: '100%',
    resizeMode: 'cover',
  },

  icon: {
    width: '100%',
    height: 100,
    resizeMode: 'cover',
  },
});

export default styles;
