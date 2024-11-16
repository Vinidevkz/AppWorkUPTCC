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
    justifyContent: 'flex-start',
  },

  scrollViewContent: {
    flexGrow: 1,
    paddingBottom: 60, // Ajuste conforme a altura da TabBar
  },

  containerTop: {
    width: '100%',
    height: 80,
    maxHeight: 80,
    backgroundColor: '#fff',
    flexDirection: 'row',
    alignItems: 'center',
    gap: 10,
    elevation: 10,
    paddingHorizontal: 20,
    zIndex: 1
  },

  container: {
    height: '100%',
    padding: 25,
    gap: 20
  },

  infosCont: {
    flexDirection: "row",
    alignItems: "center",
    justifyContent: 'space-between',
    gap: 10
  },

  profileConfigCont: {
    flexDirection: "column",

    justifyContent: 'space-between',
    gap: 10
  },

  title: {
    fontSize: 17,
  },

  text: {
    fontSize: 14,
  },
});

export default styles;