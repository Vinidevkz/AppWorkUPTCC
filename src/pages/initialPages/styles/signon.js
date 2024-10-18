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
    backgroundColor: '#fff',
    height: 70,
    maxHeight: 70,
    alignItems: 'center',
    paddingHorizontal: 20,
    gap: 20,
    flexDirection: 'row',   
    zIndex: 1,
    borderBottomWidth: 1,
    borderColor: '#20dd77'
  },

  title: {
    fontSize: 20,
    color: '#1b1b1b'
  },

  formCont: {
    width: '100%',
    paddingHorizontal: 50,
    justifyContent: 'space-between',
  },

  pdfCvCont:{
    width: '100%',
    paddingHorizontal: 30,
    gap: 5,
  },

  pdfDesc: {
    fontSize: 13,
  },

  formTitle: {
    fontSize: 16,
    color: '#1b1b1b'
  },

  profileIconBox: {
    width: 100,
    height: 100,
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
    borderRadius: 50,
    borderWidth: 2,
    borderColor: '#1b1b1b',
    backgroundColor: '#fff',
  },

  icon: {
    width: '100%',
    height: 100,
    resizeMode: 'cover',
  },

  inputCont: {
    borderRadius: 10,
    elevation: 2,
    paddingHorizontal: 15,
    paddingVertical: 8,
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
    width: 160,
    maxWidth: 160,
    paddingHorizontal: 10,
    paddingVertical: 5,
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
    paddingVertical: 20,
    alignItems: 'center',
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

