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

  ScrollView: {
    flex: 1,
  },

  title: {
    fontSize: 20,
  },

  containerTop: {
    width: '100%',
    height: 80,
    maxHeight: 80,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'space-between',
    gap: 20,
    padding: 20,
    elevation: 10,
    flexDirection: 'row'
  },

  changeCont: {
    marginVertical: 10,
    paddingVertical: 10,
    gap: 10
  },

  textInput: {
    borderRadius: 20,
    borderWidth: 1,
    borderColor: '#909090',
    padding: 10,
    paddingHorizontal: 15,
    height: 60,
  },

  areaInput: {
    borderRadius: 20,
    borderWidth: 1,
    borderColor: '#909090',
    paddingHorizontal: 15,

  },

  contactCont: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    marginVertical: 15,
  },

  contactInput: {
    borderWidth: 1,
    padding: 10,
    width: 200,
    borderRadius: 50,
    borderColor: '#909090',
  },

  button: {
    alignItems: 'center',
    justifyContent: 'center',
    flexDirection: 'row',
    gap: 5,
    width: 100,
    borderWidth: 2,
    borderColor: '#20dd77',
    padding: 8,
    borderRadius: 20
  },

  saveText: {
    color: '#20dd77'
  },

  profileBackgroundImageCont: {
    width: '100%',
    height: 200,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: '#ccc',
    position: 'relative',
    zIndex: 1,
    
  },
  
  profileBackgroundImg: {
    width: '100%',
    height: '100%',
    resizeMode: 'cover',
    zIndex: 1,
    borderRadius: 10,
  },

  profileIconBox: {
    width: 100,
    height: 100,
    position: 'absolute',
    bottom: 5, // Posiciona a metade do ícone abaixo da imagem de fundo
    left: '50%',
    transform: [{ translateX: 120 }], // Centraliza horizontalmente
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
    borderRadius: 50,
    backgroundColor: '#fff',
    zIndex: 1,
  },

  icon: {
    width: '100%',
    height: 100,
    resizeMode: 'cover',
  },

});

export default styles;
