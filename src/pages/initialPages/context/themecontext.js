import React, { createContext, useState, useContext } from 'react';

// Cria o contexto
const ThemeContext = createContext();

// Provedor do contexto
export function ThemeProvider({ children }) {
  const [darkMode, setDarkMode] = useState(true); // Estado do tema

  const toggleTheme = () => {
    setDarkMode(prevMode => !prevMode);
  };

  // Define o tema com base no estado
  const theme = {
    statusBarBackground: darkMode ? '#383838' : null,
    statusBarColor: darkMode ? '#fff' : null,
    backgroundColor: darkMode ? '#1b1b1b' : '#f4f4f4',
    backgroundColorNavBar: darkMode ? '#383838' : '#fff',
    backgroundColorSearchInput: darkMode ? '#707070' : '#dbdbdb',
    backgroundColorItens: darkMode ? "#1b1b1b" : "fff",
    iconColorGreen: darkMode ? "#20dd77" : "#20dd77",
    iconColorWhite: darkMode ? "#fff" : "#1b1b1b",
    textColor: darkMode ? '#fff' : '#1b1b1b',
    profileBorder: darkMode ? '#fff' : '#1b1b1b',
    lineColor: darkMode ? '#fff' : '#1b1b1b',

    tabBarIconColor: darkMode ? '#fff' : '#1b1b1b',
  };

  return (
    <ThemeContext.Provider value={{ theme, toggleTheme }}>
      {children}
    </ThemeContext.Provider>
  );
}

// Hook para usar o contexto
export function useTheme() {
  return useContext(ThemeContext);
}