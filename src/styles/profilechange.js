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
    fontSize: 20,
  },

  containerTop: {
    width: '100%',
    height: 80,
    maxHeight: 80,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'space-between',
    gap: 20,
    padding: 20,
    elevation: 10,
    flexDirection: 'row'
  },

  changeCont: {
    marginVertical: 10,
    paddingVertical: 10,
    gap: 10
  },

  textInput: {
    width: 300,
    height: 40,
    borderRadius: 20,
    borderWidth: 1,
    borderColor: '#909090',
    paddingHorizontal: 10,
  },

  contactCont: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    marginVertical: 15,
  },

  contactInput: {
    borderWidth: 1,
    padding: 10,
    width: 200,
    borderRadius: 50,
    borderColor: '#909090',
  },

  button: {
    alignItems: 'center',
    justifyContent: 'center',
    flexDirection: 'row',
    gap: 5,

    borderWidth: 2,
    borderColor: '#20dd77',
    padding: 8,
    borderRadius: 20
  },

  saveText: {
    color: '#20dd77'
  }

});

export default styles;
