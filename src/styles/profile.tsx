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
    backgroundColor: 'blue',
  },

  ScrollView: {
    flex: 1,
    width: '100%',  // Garante que o ScrollView ocupe 100% da largura da tela
  },

  profileBackgroundImageCont: {
    width: '100%',
    height: 200, // Altura fixa em pixels
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden', // Mantém a imagem dentro do container
    backgroundColor: '#ccc', // Cor de fundo (opcional), caso a imagem não cubra o espaço
  },
  
  profileBackgroundImg: {
    width: '100%',
    height: '100%', // Faz com que a imagem ocupe todo o container
    resizeMode: 'cover', // Garante que a imagem cubra o container mantendo as proporções
  },
  

  profileCont: {
    flex: 1,
    width: '100%',  // Garante que o container ocupe 100% da largura da tela
  },

  profileHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    padding: 20,
  },

  profileName: {
    fontSize: 30,
  },

  profileUserName: {
    fontSize: 18,
  },

  profileUserLocation: {
    fontSize: 16,
  },

  profileIconBox: {
    width: 100,
    height: 100,
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
    borderRadius: 50,
    borderWidth: 3,
  },

  icon: {
    width: '100%',
    height: 100,
    resizeMode: 'cover',
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


  // A implementar:
  // profileExpCont: {

  // },

  // profileExpBox: {

  // },

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

  linkText: {

  },

  linkButton: {
    alignItems: 'center',
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
    padding: 15,
    width: 200,
  },

  CVButtonText: {
    fontSize: 20
  },

  title: {
    fontSize: 25,
  },

  text: {
    fontSize: 15,
  },
});

export default styles;
