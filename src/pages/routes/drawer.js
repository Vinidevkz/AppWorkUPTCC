import { createDrawerNavigator } from '@react-navigation/drawer';

const Drawer = createDrawerNavigator();

import Vagas from '../vagas'
import Home from '../home'

export default function openDrawer() {
  return (
    <Drawer.Navigator initialRouteName='Home'>
        <Drawer.Screen name="Home" component={Home} />
        <Drawer.Screen name="Vagas" component={Vagas} />
    </Drawer.Navigator>
  );
}
