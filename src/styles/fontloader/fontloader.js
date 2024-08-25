import { useState, useEffect } from "react";
import * as Font from "expo-font";

export default function useFonts() {
  const [fontsLoaded, setFontsLoaded] = useState(false);

  useEffect(() => {
    const loadFonts = async () => {
      await Font.loadAsync({
        "DMSans-Regular": require("../../../assets/fonts/DMSans-Regular.ttf"),
        "DMSans-Bold": require("../../../assets/fonts/DMSans-Bold.ttf"),
      });
      setFontsLoaded(true);
    };

    loadFonts();
  }, []);

  return fontsLoaded;
}
