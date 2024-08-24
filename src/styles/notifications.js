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
    fontSize: 25,
  },

  containerTop: {
    width: '100%',
    height: 80,
    maxHeight: 80,
    backgroundColor: '#fff',
    justifyContent: 'center',
    padding: 20,
    borderBottomEndRadius: 10,
    borderBottomLeftRadius: 10,
    elevation: 10,
  },

});

export default styles;
