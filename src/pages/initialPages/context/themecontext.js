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
    backgroundColor: darkMode ? '#1b1b1b' : '#fff',
    backgroundColorNavBar: darkMode ? '#383838' : '#fff',
    backgroundColorItens: darkMode ? "#1b1b1b" : "fff",
    iconColorGreen: darkMode ? "#20dd77" : "#1b1b1b",
    iconColorWhite: darkMode ? "#fff" : "#1b1b1b",
    textColor: darkMode ? '#fff' : '#1b1b1b',

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
