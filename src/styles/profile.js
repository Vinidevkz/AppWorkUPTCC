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

  ScrollView: {
    flex: 1,
    width: '100%',
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
    borderWidth: 3,
    borderColor: '#1b1b1b',
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

  },

  profileHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    padding: 20,
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
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 10,
    padding: 20,
  },

  profilePrefsCont: {
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 10,
    padding: 20,
  },

  usersPrefBox: {
    gap: 5
  },

  profileSkillsCont: {
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 10,
    padding: 20,
  },

  profileLinksCont: {
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 10,
    padding: 20,
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
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 25,
    padding: 20,
  },

  CVButton: {
    alignItems: 'center',
    justifyContent: 'center',
    borderWidth: 2,
    borderRadius: 50,
    borderColor: '#56c596',
    backgroundColor: '#fff',
    elevation: 3,
    padding: 15,
    width: 200,
  },

  CVButtonText: {
    fontSize: 20
  },

  title: {
    fontSize: 20,
  },

  text: {
    fontSize: 14,
  },
});

export default styles;
