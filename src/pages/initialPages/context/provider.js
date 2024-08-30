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
  const [cep, setCep] = useState('');
  const [nasc, setNasc] = useState('');
  const [bio, setBio] = useState('');


  return (
    <Context.Provider value={{ nome, setNome, userName, setUserName, idade, setIdade, email, setEmail, senha, setSenha, tel, setTel, nasc, setNasc, cep, setCep, bio, setBio }}>
      {children}
    </Context.Provider>
  );
};
