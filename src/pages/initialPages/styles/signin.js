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
    justifyContent: 'center',
    gap: 100,
    backgroundColor: '#f4f4f4'
  },

  container: {
    alignItems: 'center',
    flex: 1,
    width: '100%'
  },

  loginCont: {
    padding: 20,
    gap: 20,
    justifyContent: 'center',
    alignItems: 'center'
  },

  workuplogo: {
    width: 200,
    height: 40,
  },

  title: {
    fontSize: 25,
    alignSelf: 'flex-start'
  },    

  body: {
    gap: 15,
    height: 400,
  },

  inputCont: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 20,
    width: 350,
    height: 60,
    paddingHorizontal: 10,
    borderWidth: 2,
    borderRadius: 10,
    borderColor: '#20dd77',
    backgroundColor: '#fff'
  },

  input: {
    fontSize: 17,
    flex: 1,
  },

  button: {
    backgroundColor: '#20dd77',
    alignItems: 'center',
    alignSelf: 'center',
    justifyContent: 'center',
    borderRadius: 50,
    width: 180,
    padding: 15,
    elevation: 10,
  },

  buttonText: {
    fontSize: 18,
  },

  footer: {
    flexDirection: 'row',
    alignItems: 'center',
    alignSelf: 'center'
  },

  footerButton: {
    borderBottomWidth: 2,
    borderColor: '#20dd77'
  }
});

export default styles;
