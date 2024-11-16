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

  navbar: {
    flexDirection: 'row',
    width: '100%',
    height: 80,
    alignItems: 'center',
    justifyContent: 'space-between',
    gap: 20,
    paddingTop: 15,
    paddingBottom: 10,
    paddingHorizontal: 25,
    zIndex: 1,
  },

  WUPstyle: {
    width: 100,
    height: 50
  },

  iconBox: {
    flexDirection: 'row',
    gap: 30
  },

  // searchbar: {
  //   borderWidth: 3,
  //   borderColor: '#56C596',
  //   borderRadius: 20,
  //   width: 250,
  //   paddingVertical: 5,
  //   paddingHorizontal: 5,
  // },


  button: {
    backgroundColor: '#20dd77',
    alignItems: 'center',
    justifyContent: 'center',
  },

  buttonText: {
    color: '#fff',
    fontSize: 18,
  },

  titleCont: {
    justifyContent: 'center',
    height: 50,
    marginVertical: 10,
    marginHorizontal: 20
  },

  titleCont2: {
    alignItems: 'center',
    justifyContent: 'space-between',
    height: 50,
    marginVertical: 10,
    marginHorizontal: 20,
    flexDirection: 'row',
  },

  title: {
    fontSize: 25,
  },

  row: {
    flexDirection: 'row'
  },

  text: {
    fontSize: 15,
  },

  vagasScrollView: {
    flex: 1,
  },

  flatlist: {
    paddingHorizontal: 15,
  },

  vagaCont: {
    backgroundColor: '#fff',
    borderRadius: 25,
    alignItems: 'center',
    justifyContent: 'space-around',
    width: 300,
    height: 300,
    paddingHorizontal: 25,
    paddingVertical: 15,
    elevation: 5,
    margin: 10,
    marginRight: 5,
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
    fontSize: 20,
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
    width: '70%',
    paddingVertical: 10,
    borderRadius: 20,
  },

  addFavButton: {
    alignItems: 'center',
    justifyContent: 'center',
    padding: 10,
  },

  // Estilo Posts
  postCont: {
    borderRadius: 20,
    backgroundColor: '#fff',
    padding: 15,
    marginBottom: 20,
    marginHorizontal: 10,
    width: 400,
    maxWidth: 400,
    maxHeight: 800,
    elevation: 5,
  },

  postHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 10,
  },

  postIconBox: {
    borderRadius: 50,
    width: 50,
    height: 50,
  },

  postIconImg: {
    width: '100%',
    height: '100%',
    borderRadius: 50,
  },

  postTile: {
    fontSize: 17,
  },

  postBody: {
    paddingVertical: 20,
    paddingHorizontal: 10,
    gap: 10,
  },

  postDesc: {
    fontSize: 15,
  },

  postImgCont: {
    width: '100%',
    height: 200,
    borderRadius: 20,
  },

  postImg: {
    width: '100%',
    height: '100%',
    borderRadius: 20,
  },

  optionsCont: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    paddingVertical: 10,
  },

  threeIconsCont: {
    flexDirection: 'row',
    gap: 20,
    alignItems: 'center',
  },

  postIcons: {
    // Estilo vazio
  },

  // Estilo Comentários
  postComentCont: {
    borderWidth: 3,
    borderColor: '#56c596',
    borderRadius: 10,
    padding: 10,
    marginTop: 10,
    marginBottom: 10,
    width: '100%',
    flexShrink: 1,
  },

  comentHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    paddingVertical: 10,
  },

  comentHeaderP1: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 5,
  },

  comentIconBox: {
    width: 50,
    height: 50,
    backgroundColor: '#888888',
    alignItems: 'center',
    justifyContent: 'center',
    borderRadius: 50,
  },

  comentIcon: {
    width: '100%',
    height: '100%',
    borderRadius: 50,
  },

  comentTitle: {
    fontSize: 16
  },

  comentDate: {
    fontSize: 13
  },

  comentDescCont: {
    padding: 5
  },

  comentDesc: {
    fontSize: 15
  },

  profileIconBox: {
    width: 50,
    height: 50,
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
    borderRadius: 50,
    backgroundColor: '#fff',
    zIndex: 1,
  },

  icon: {
    width: '100%',
    height: 50,
    resizeMode: 'cover',
  },

  //scroll indicator
  progressBarContainer: {
    height: 4,
    backgroundColor: "#e0e0e0", // Cor do fundo do indicador
    width: "80%",
    alignSelf: 'center',
    borderRadius: 2,
    marginTop: 10, // Espaçamento da FlatList
  },
  progressBar: {
    height: "100%",
    backgroundColor: "#20dd77", // Cor do progresso
    borderRadius: 2,
  },
});

export default styles;
