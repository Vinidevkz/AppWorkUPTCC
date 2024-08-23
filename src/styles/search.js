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
    backgroundColor: '#fff',
    justifyContent: 'center',
    height: 100
  },

  searchInput: {
    borderWidth: 3,
    borderColor: '#20dd77',
    padding: 5,
    backgroundColor: '#1b1b1b'
  }
});

export default styles;
