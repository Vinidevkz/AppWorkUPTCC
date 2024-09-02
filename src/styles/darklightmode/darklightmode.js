import { useState } from 'react';

// Define um hook personalizado para alternar entre temas
export function useAppearance() {
  const [darkMode, setDarkMode] = useState(false); // Estado para tema claro/escuro

  // Função para alternar entre temas
  const toggleTheme = () => {
    setDarkMode(prevMode => !prevMode);
  };

  // Define cores com base no tema
  const theme = {
    statusBarBackground: darkMode ? '#474747' : null,
    statusBarColor: darkMode ? '#474747' : null,
    backgroundColor: darkMode ? '#1b1b1b' : '#fff',
    backgroundColorNavBar: darkMode ? '#474747' : '#fff',
    backgroundColorItens: darkMode ? "#1b1b1b" : "fff",
    iconColor: darkMode ? "#20dd77" : "#1b1b1b",
    textColor: darkMode ? '#fff' : '#1b1b1b',

  };

  return { theme, toggleTheme };
}
