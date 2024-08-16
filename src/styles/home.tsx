import { StyleSheet } from 'react-native';

const styles = StyleSheet.create({
  SafeAreaView: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'flex-start',
    marginTop: 50,
  },

  DMSansRegular: {
    fontFamily: 'DMSans-Regular',
  },

  DMSansBold: {
    fontFamily: 'DMSans-Bold',
  },

  ScrollView: {
    flex: 1,
    marginHorizontal: 20,
  },

  navbar: {
    flexDirection: 'row',
    width: '100%',
    alignItems: 'center',
    justifyContent: 'space-between',
    marginBottom: 10,
  },

  searchbar: {
    borderWidth: 3,
    borderColor: '#56C596',
    borderRadius: 20,
    width: 250,
    paddingVertical: 5,
    paddingHorizontal: 10,
  },

  iconbox: {
    backgroundColor: '#56C596',
    width: 50,
    height: 50,
    borderRadius: 50,
    alignItems: 'center',
    justifyContent: 'center',
  },

  button: {
    backgroundColor: '#56c596',
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
  },

  title: {
    fontSize: 25,
  },

  text: {
    fontSize: 15,
  },

  vagasScrollView: {
    flex: 1,
    padding: 5,
  },

  vagaCont: {
    backgroundColor: '#f6f6f6',
    borderWidth: 2,
    borderRadius: 25,
    borderColor: '#56C596',
    alignItems: 'center',
    justifyContent: 'space-between',
    width: 250,
    height: 250,
    padding: 20,
    marginRight: 15,
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
    fontSize: 22,
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

  buttonVaga: {
    width: '100%',
    paddingVertical: 10,
    borderRadius: 20,
  },

  // Estilo Posts
  postCont: {
    borderWidth: 2,
    borderRadius: 20,
    padding: 15,
    marginBottom: 20,
    width: '100%',
    maxHeight: 800,
  },

  postHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 10,
  },

  postIconBox: {
    borderWidth: 2,
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
    padding: 10,
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
  },

  threeIconsCont: {
    flexDirection: 'row',
    gap: 10,
    alignItems: 'center',
  },

  postIcons: {
    // Estilo vazio
  },

  // Estilo Comentários
  postComentCont: {
    backgroundColor: '#888888',
    borderRadius: 10, // Borda arredondada para estética
    padding: 10, // Espaço interno
    marginTop: 10, // Separação superior
    marginBottom: 10, // Separação inferior
    width: '100%', // Largura total
    // Remova alturas fixas e use flex para ajuste automático
    flexShrink: 1, // Permite que o container encolha se necessário
  },

  comentHeader: {
    backgroundColor: '#222222',
    justifyContent: 'center',
    padding: 10, // Espaço interno
    borderTopLeftRadius: 10, // Borda arredondada superior esquerda
    borderTopRightRadius: 10, // Borda arredondada superior direita
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

  comentDesc: {
    // Estilo vazio
  },
});

export default styles;
