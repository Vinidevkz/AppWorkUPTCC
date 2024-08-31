import { StyleSheet } from 'react-native';

const styles = StyleSheet.create({
  SafeAreaView: {
    height: '100%',
    alignItems: 'center',
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
    elevation: 10,
    zIndex: 1
  },

  profileIconBox: {
    width: 100,
    height: 100,
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
    height: 100,
    resizeMode: 'cover',
  },

  container: {
    padding: 20,
    gap: 30
  },

  vagaHeader: {
    backgroundColor: '#fff',
    flexDirection: 'row'
  },

  headerTextCont: {
    width: 300,
  },

  titleVaga: {
    fontSize: 25,
  },

  corpText: {
    fontSize: 18,
  },

  vagaDateText: {
    fontSize: 15,
  },

  title: {
    fontSize: 18
  },

  text: {
    fontSize: 16,
  },

  infosCont: {
    gap: 10
  }
});

export default styles;
