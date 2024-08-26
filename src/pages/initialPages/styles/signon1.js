import { StyleSheet } from "react-native";

const styles = StyleSheet.create({
  DMSansRegular: {
    fontFamily: "DMSans-Regular",
  },

  DMSansBold: {
    fontFamily: "DMSans-Bold",
  },

  SafeAreaView: {
    backgroundColor: '#f4f4f4',
  },

  mainContainer: {
    height: '80%',
    alignItems: 'center',
    justifyContent: 'center',
    gap: 15
  },

  header: {
    backgroundColor: '#fff',
    height: 70,
    maxHeight: 70,
    alignItems: 'center',
    paddingHorizontal: 20,
    gap: 20,
    flexDirection: 'row',
    elevation: 10,
    zIndex: 1
  },

  title: {
    fontSize: 20
  },

  formCont: {
    width: 300,
    maxWidth: 300,
    gap: 5
  },

  formTitle: {
    fontSize: 18
  },

  inputCont: {
    borderWidth: 3,
    borderColor: '#20dd77',
    borderRadius: 10,
    paddingHorizontal: 10,
    paddingVertical: 5,
    backgroundColor: '#fff',
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center'
  },

  inputText: {
    flex: 1
  },

  button: {
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: '#20dd77',
    width: 140,
    padding: 10,
    borderRadius: 50,
    elevation: 2
  },

  buttonText: {
    fontSize: 15
  },

  footerCont: {
    flexDirection: 'row',
    width: '100%',
    alignItems: 'center',
    justifyContent: 'flex-end'
  },

  nextButton: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 5,
    paddingHorizontal: 15
  },
  
  footerText: {
    fontSize: 17
  }
});

export default styles;

