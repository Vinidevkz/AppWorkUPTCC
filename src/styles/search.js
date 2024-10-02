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
    flexGrow: 1,
    paddingBottom: 60, // Ajuste conforme a altura da TabBar
  },

  containerTop: {
    width: '100%',
    height: 80,
    maxHeight: 80,
    backgroundColor: '#fff',
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
    elevation: 10,
  },

  searchInput: {
    borderRadius: 20,
    paddingVertical: 5,
    paddingHorizontal: 10,
    backgroundColor: '#f4f4f4',
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
    gap: 10,
    fontSize: 17,
  },

  searchFontSize: {
    fontSize: 15,
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
});

export default styles;
