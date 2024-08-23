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
  },

  container: {
    alignItems: 'center',
    flex: 1,
    width: '100%'
  },

  Header: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    gap: 10,
 //  backgroundColor: 'red',
    width: '100%',
  },

  Body: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
  //  backgroundColor: 'green',
    width: '100%',
  },

  Bottom: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    width: '100%',
    gap: 10
   // backgroundColor: 'blue'
  },

  Footer: {
    alignItems: 'center',
    justifyContent: 'center',
    padding: 20,
    gap: 10
   // backgroundColor: 'blue'
  },

  workuplogo: {
    width: 300,
    height: 60
  },

  title: {
    fontSize: 16,
  },

  img: {
    width: 300,
    height: 300
  },

  white: {
    color: '#f4f4f4'
  },

  button: {
    borderWidth: 2,
    alignItems: 'center',
    justifyContent: 'center',
    padding: 10,
    borderRadius: 10,
    width: '50%',
    elevation: 3
  },

  buttonText: {
    fontSize: 15,
  },

  loginButton: {
    backgroundColor: '#f4f4f4',
    borderColor: '#f4f4f4'
  },

  cadButton: {
    backgroundColor: '#1b1b1b',
    borderColor: '#1b1b1b'
  },

  googleButton: {
    backgroundColor: '#f4f4f4',
    borderColor: '#f4f4f4',
    flexDirection: 'row',
    gap: 10
  },

  background: {
    position: 'absolute',
    height: 900,
    width: 500,
  },

  footerText: {
    alignItems: 'center'
  },

  touchText: {
    color: '#1b1b1b',
  },

  icon: {
    width: 20,
    height: 20,
  }
});

export default styles;
