import { StyleSheet } from "react-native";

const styles = StyleSheet.create({
  DMSansRegular: {
    fontFamily: "DMSans-Regular",
  },

  DMSansBold: {
    fontFamily: "DMSans-Bold",
  },

  SafeAreaView: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'flex-start',
  },

  scrollViewContent: {
    flexGrow: 1,
    paddingBottom: 50
  },

  containerTop: {
    width: '100%',
    height: 80,
    maxHeight: 80,
    backgroundColor: '#fff',
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    elevation: 10,
    paddingHorizontal: 20,
    zIndex: 1,
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
    zIndex: 1
  },

  profileIconBox: {
    width: 100,
    height: 100,
    position: 'absolute',
    bottom: -50, // Posiciona a metade do ícone abaixo da imagem de fundo
    left: '50%',
    transform: [{ translateX: 80 }], // Centraliza horizontalmente
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
    borderRadius: 50,
    borderWidth: 2,
    backgroundColor: '#fff',
    zIndex: 1,
  },

  icon: {
    width: '100%',
    height: 100,
    resizeMode: 'cover',
  },

  profileCont: {
    flex: 1,
    width: '100%',
    paddingHorizontal: 25,
    paddingVertical: 30,
    gap: 30
  },

  profileHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    width: '100%',
  },

  profileName: {
    fontSize: 25,
  },

  profileUserName: {
    fontSize: 18,
  },

  profileUserLocation: {
    fontSize: 16,
  },

  profileBioCont: {


  },

  profilePrefsCont: {
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 10,
  },

  usersPrefBox: {
    gap: 5
  },

  profileSkillsCont: {
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 10,

  },

  profileLinksCont: {
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 10,
  },

  linkLine: {
    alignItems: 'center',
    justifyContent: 'center',
    flexDirection: 'row'
  },

  linkTitle: {
    fontSize: 16,
  },

  profileCVCont: {
    gap: 25,
  },

  line: {
    alignSelf: 'center',
    width: '80%',
    borderBottomWidth: 1
  },

  CVButton: {
    alignItems: 'center',
    justifyContent: 'center',
    borderRadius: 50,
    backgroundColor: '#20dd77',
    paddingVertical: 10,
    width: '30%'

  },

  CVButtonText: {
    fontSize: 15,
    color: '#fff'
  },

  title: {
    fontSize: 20,
  },

  text: {
    fontSize: 14,
  },

  vagaCont: {
    backgroundColor: '#fff',
    borderRadius: 25,
    alignItems: 'center',
    justifyContent: 'space-around',
    width: 250,
    height: 250,
    paddingHorizontal: 25,
    elevation: 5,
    margin: 10,
    borderBottomWidth: 3,
    borderColor: '#20dd77'
  },

  vagaHead: {
    width: '100%',
    alignItems: 'flex-start',
  },

  vagaBody: {
    width: '100%',
    alignItems: 'flex-start',
  },

  titleVaga: {
    fontSize: 18,
  },

  corpText: {
    // Estilo vazio
  },

  dateText: {
    // Estilo vazio
  },

  descVaga: {
    // Estilo vazio
  },

  vagaFooterCont: {
    width: '100%',
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center'
  },

  buttonVaga: {
    width: '50%',
    paddingVertical: 10,
    borderRadius: 20,
  },

  button: {
    backgroundColor: '#20dd77',
    alignItems: 'center',
    justifyContent: 'center',
  },

  buttonText: {
    color: '#fff',
    fontSize: 15,
  },
});

export default styles;
