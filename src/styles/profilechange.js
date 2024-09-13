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
    alignItems: 'center',
    gap: 20,
    padding: 20,
    elevation: 10,
    flexDirection: 'row'
  },

  changeCont: {
    marginVertical: 10
  },

  textInput: {
    width: 300,
    height: 40,
    borderRadius: 10,
    borderWidth: 2,
    borderColor: '#909090',
    paddingHorizontal: 10,
  },

  contactCont: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    marginVertical: 18,
  },

  contactInput: {
    borderBottomWidth: 2,
    borderColor: '#909090',
  },

  button: {
    backgroundColor: '#20dd77',
    width: 150,
    alignItems: 'center',
    alignSelf: 'flex-end',
    justifyContent: 'center',
    padding: 15,
    borderRadius: 20,
    elevation: 5,
    margin: 10
  }

});

export default styles;
