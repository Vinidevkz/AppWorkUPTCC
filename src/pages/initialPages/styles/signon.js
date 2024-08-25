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
    alignItems: 'flex-start',
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
    fontSize: 20
  },

  inputCont: {
    borderWidth: 3,
    borderColor: '#20dd77',
    borderRadius: 20,
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
    width: 120,
    padding: 10,
    borderRadius: 50,
    elevation: 5
  },

  buttonText: {
    fontSize: 20
  }
});

export default styles;

