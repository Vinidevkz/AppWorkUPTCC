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
    gap: 35
  },

  header: {
    backgroundColor: '#20dd77',
    height: 70,
    maxHeight: 70,
    alignItems: 'center',
    paddingHorizontal: 20,
    gap: 20,
    flexDirection: 'row',
    elevation: 10,
    zIndex: 1,
    borderBottomRightRadius: 20,
    borderBottomLeftRadius: 20,

  },

  title: {
    fontSize: 20,
    color: '#fff'
  },

  formCont: {
    width: '100%',

    paddingHorizontal: 50,
    gap: 5
  },

  pdfCvCont:{
    width: '100%',
    paddingHorizontal: 30,
    gap: 5
  },

  formTitle: {
    fontSize: 18,
    color: '#1b1b1b'
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

  row: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between'
  },

  inputText: {
    flex: 1
  },

  bioCont: {
    backgroundColor: '#fff',
    borderRadius: 20,
    elevation: 5,
    height: 200,
    width: '100%',
    padding: 20,
    textAlignVertical: 'top',
  },

  button: {
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: '#20dd77',
    width: 150,
    padding: 10,
    borderRadius: 50,
    elevation: 2
  },

  gap: {
    gap: 20
  },

  buttonText: {
    fontSize: 15
  },

  footerCont: {
    flexDirection: 'row',
    width: '100%',
    alignItems: 'flex-end',
    justifyContent: 'space-between',
  },

  nextButton: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 5,
    paddingHorizontal: 15,
    alignSelf: 'flex-end'
  },

  backButton: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 5,
    paddingHorizontal: 15,
    alignSelf: 'flex-start'
  },
  
  footerText: {
    fontSize: 17
  },
  
  nextText: {
    fontSize: 17,
    borderBottomWidth: 2,
    borderColor: '#20dd77'
  }
});

export default styles;

