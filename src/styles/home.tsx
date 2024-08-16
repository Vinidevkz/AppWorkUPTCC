import { StyleSheet } from 'react-native'

const styles = StyleSheet.create({
     SafeAreaView: {
      flex: 1,
      alignItems: 'center',
      justifyContent: 'center',
      marginTop: 50,
    },

    DMSansRegular: {
      fontFamily: 'DMSans-Regular',
    },

    DMSansBold: {
      fontFamily: 'DMSans-Bold',
    },

    ScrollView: {
      flex: 1,
      marginHorizontal: 20,
    },

    navbar: {
      flexDirection: 'row',
      width: '100%',
      alignItems: 'center',
      justifyContent: 'space-between'
    },

    searchbar: {
      borderWidth: 3,
      borderColor: '#56C596',
      borderRadius: 20,
      width: 250,
      paddingVertical: 5,
      paddingHorizontal: 10
    },

    icon: {
      
    },

    iconbox: {
      backgroundColor: '#56C596',
      width: 50,
      height: 50,
      borderRadius: 50,
      alignItems: 'center',
      justifyContent: 'center'
    },

    button: {
      backgroundColor: '#56c596',
      alignItems: 'center',
      justifyContent: 'center'
    },

    buttonText: {
      color: '#fff',
      fontSize: 18,
    },

    titleCont: {
      justifyContent: 'center',
      height: 50,
      marginVertical: 10,
    },

    title: {
      fontSize: 25,
    },

    text: {
      fontSize: 15,
    },

    vagasScrollView: {
      flex: 1,
      padding: 5
    },

    vagaCont: {
      backgroundColor: '#f6f6f6',
      borderWidth: 2,
      borderRadius: 25,
      borderColor: '#56C596',
      alignItems: 'center',
      justifyContent: 'space-between',
      width: 250,
      height: 250,
      padding: 20,
      marginRight: 15,
    },

    vagaHead: {
      width: '100%',
      alignItems: 'flex-start'
    },

    vagaBody: {
      width: '100%',
      alignItems: 'flex-start'
    },

    titleVaga: {

      fontSize: 22,
    },

    corpText: {

    },

    dateText: {

    },

    descVaga: {
    },

    buttonVaga: {
      width: '100%',
      paddingVertical: 10,
      borderRadius: 20
    }
  }
)

export default styles;