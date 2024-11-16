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
    gap: 50,
    backgroundColor: '#f4f4f4'
  },

  header: {
    backgroundColor: '#fff',
    height: 70,
    maxHeight: 70,
    alignItems: 'center',
    paddingHorizontal: 20,
    gap: 10,
    flexDirection: 'row',   
    zIndex: 1,
    borderBottomWidth: 1,
    borderColor: '#20dd77'
  },

  titleHeader: {
    fontSize: 17,
    color: '#1b1b1b'
  },

  loginCont: {
    paddingHorizontal: 15,
    gap: 20,
    justifyContent: 'center',
    alignItems: 'center',
  },

  title: {
    fontSize: 17,
    alignSelf: 'flex-start'
  },    

  inputCont: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 20,
    height: 50,
    paddingHorizontal: 10,
    borderRadius: 10,
    elevation: 2,
    backgroundColor: '#fff'
  },

  input: {
    fontSize: 17,
    flex: 1,
  },

  button: {
    alignItems: 'center',
    alignSelf: 'flex-end',
    justifyContent: 'center',
    borderBottomWidth: 2,
    borderColor: '#20dd77',
    flexDirection: 'row',
    padding: 5
  },

  buttonText: {
    fontSize: 18,
  },

  footer: {
    flexDirection: 'row',
    alignItems: 'center',
    alignSelf: 'center',
    marginTop: '100%'
  },

  footerButton: {
    borderBottomWidth: 2,
    borderColor: '#20dd77'
  }
});

export default styles;
