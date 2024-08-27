// context/provider.js
import React, { createContext, useState } from 'react';

export const Context = createContext();

export const Provider = ({ children }) => {
  const [nome, setNome] = useState('');
  const [userName, setUserName] = useState('');
  const [idade, setIdade] = useState('');
  const [email, setEmail] = useState('');
  const [senha, setSenha] = useState('');
  const [tel, setTel] = useState('');
  const [date, setDate] = useState('');
  const [cep, setCep] = useState('');

  return (
    <Context.Provider value={{ nome, setNome, userName, setUserName, idade, setIdade, email, setEmail, senha, setSenha, tel, setTel, date, setDate, cep, setCep }}>
      {children}
    </Context.Provider>
  );
};
