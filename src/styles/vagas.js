import { StyleSheet } from 'react-native';

const styles = StyleSheet.create({
  SafeAreaView: {
    flex: 1,
    backgroundColor: '#fff'
  },

  DMSansRegular: {
    fontFamily: 'DMSans-Regular',
  },

  DMSansBold: {
    fontFamily: 'DMSans-Bold',
  },

  navbar: {
    flexDirection: 'row',
    width: '100%',
    height: 80,
    alignItems: 'center',
    justifyContent: 'space-between',
    gap: 20,
    paddingTop: 15,
    paddingBottom: 10,
    paddingHorizontal: 25,
    backgroundColor: '#fff',
    elevation: 3,
    zIndex: 1
  },

  profileIconBox: {
    width: 70,
    height: 70,
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
    borderRadius: 50,
    borderWidth: 3,
    borderColor: '#1b1b1b',
    backgroundColor: '#fff',
  },

  icon: {
    width: '100%',
    height: '100%',
    resizeMode: 'cover',
  },

  container: {
    padding: 20,
    gap: 30
  },

  vagaHeader: {
    backgroundColor: '#fff',
    justifyContent: 'space-between',
    flexDirection: 'row',
  },

  headerTextCont: {
    width: 300,
  },

  titleVaga: {
    fontSize: 19,
  },

  corpText: {
    fontSize: 15,
  },

  vagaDateText: {
    fontSize: 13,
  },

  title: {
    fontSize: 17
  },

  text: {
    fontSize: 16,
  },

  infosCont: {
    gap: 10,
    marginVertical: 20,
    paddingVertical: 10,
  },

  button: {
    backgroundColor: '#20dd77',
    alignItems: 'center',
    justifyContent: 'center',
    padding: 10,
    borderRadius: 20,
    width: '100%'
  },

  buttonText: {
    color: '#fff',
    fontSize: 16,
  },

  row: {
    flexDirection: 'row'
  },

  containerTop: {
    height: 80,
    backgroundColor: '#fff',
    alignItems: 'center',
    padding: 20,
    elevation: 3,
  },
});

export default styles;
