import { StyleSheet } from "react-native";
import { ScrollView } from "react-native-gesture-handler";

const styles = StyleSheet.create({
  DMSansRegular: {
    fontFamily: "DMSans-Regular",
  },

  DMSansBold: {
    fontFamily: "DMSans-Bold",
  },

  SafeAreaView: {
    flex: 1,
   
    backgroundColor: '#f4f4f4'
  },

  ScrollView: {
    backgroundColor: '#f4f4f4',
    flexGrow: 1,
  },

  container: {
    alignItems: 'center',
    paddingHorizontal: 20,
    gap: 20,
    marginTop: 25,
    marginBottom: 100
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
    fontSize: 25
  },

  formCont: {
    width: 300,
    maxWidth: 300,
    gap: 15
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
    backgroundColor: '#fff'
  },

  inputText: {
    fontSize: 18,
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
  }
});

export default styles;

