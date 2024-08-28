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

  containerTop: {
    width: '100%',
    height: 80,
    maxHeight: 80,
    backgroundColor: '#fff',
    justifyContent: 'center',
    padding: 20,
    borderBottomEndRadius: 20,
    borderBottomLeftRadius: 20,
    elevation: 10,
  },

  searchInput: {
    borderWidth: 3,
    borderRadius: 20,
    borderColor: '#20dd77',
    paddingVertical: 5,
    paddingHorizontal: 10,
    backgroundColor: '#f4f4f4',
    flexDirection: 'row',
    gap: 10,
    fontSize: 17,

  },

  searchFontSize: {
    fontSize: 15,
    flex: 1
  }
});

export default styles;
