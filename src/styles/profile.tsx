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
    height: '20%',
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
  },

  profileBackgroundImg: {
    width: '100%',
    aspectRatio: 16 / 9, // Mantém uma proporção de 16:9, você pode ajustar conforme necessário
    resizeMode: 'cover',
  },

  profileCont: {
    flex: 1,
    width: '100%',  // Garante que o container ocupe 100% da largura da tela
    backgroundColor: '#808080',
  },

  profileHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    backgroundColor: '#909090',
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
    backgroundColor: '#707070',
    padding: 20,
  },

  profilePrefsCont: {
    flexDirection: 'column',
    alignItems: 'flex-start',
    gap: 10,
    backgroundColor: '#999999',
    padding: 20,
  },

  usersPrefBox: {
    gap: 5
  },

  title: {
    fontSize: 25,
  },

  text: {
    fontSize: 15,
  },
});

export default styles;
