import { StyleSheet } from 'react-native';

const styles = StyleSheet.create({
  SafeAreaView: {
    flex: 1,

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

  item: {
    margin: 10
  },


//Chat styles

msgBox: {
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'space-between',
  paddingHorizontal: 30,
  paddingVertical: 10,
  borderTopRightRadius: 20,
  borderTopLeftRadius: 20,

  backgroundColor: '#fff',
  gap: 10,
},

input: {
  backgroundColor: '#f4f4f4',
  borderRadius: 20,
  flex: 1,
  height: 50,
  paddingHorizontal: 10,
},

sendBox: {
  backgroundColor: '#20dd77',
  padding: 15,
  borderRadius: 50,
  height: 55
},

icon: {
  width: '100%',
  height: 100,
  resizeMode: 'cover',
},
});

export default styles;
