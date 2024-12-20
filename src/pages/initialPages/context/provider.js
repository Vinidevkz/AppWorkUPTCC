// context/provider.js
import React, { createContext, useState, useSyncExternalStore } from "react";

export const Context = createContext();

export const Provider = ({ children }) => {
  const [userId, setUserId] = useState();
  const [nome, setNome] = useState("");
  const [userName, setUserName] = useState("");
  const [idade, setIdade] = useState("");
  const [email, setEmail] = useState("");
  const [senha, setSenha] = useState("");
  const [areaInt, setAreaInt] = useState("");
  const [ensinoMedio, setEnsinoMedio] = useState(null);
  const [anoFormacao, setAnoFormacao] = useState(null);
  const [linguaEstrangeira, setLinguaEstrangeira] = useState(null);
  const [tel, setTel] = useState("");
  const [emailContato, setEmailContato] = useState("");
  const [cep, setCep] = useState("");
  const [nasc, setNasc] = useState("");
  const [bio, setBio] = useState("");
  const [formacaoUsuario, setFormacaoUsuario] = useState("");
  const [fotoUsuario, setFotoUsuario] = useState("");

  const [cursosUsuario, setCursosUsuarios] = useState("");

  const [vagaID, setVagaID] = useState("");

  const [empresaId, setEmpresaId] = useState("");
  const [nomeEmpresa, setNomeEmpresa] = useState("")

  const [idChat, setIdChat] = useState("");

  return (
    <Context.Provider
      value={{
        nome,
        setNome,
        userName,
        setUserName,
        idade,
        setIdade,
        email,
        setEmail,
        senha,
        setSenha,
        areaInt,
        setAreaInt,
        linguaEstrangeira,
        setLinguaEstrangeira,
        ensinoMedio,
        setEnsinoMedio,
        anoFormacao,
        setAnoFormacao,
        tel,
        setTel,
        emailContato,
        setEmailContato,
        nasc,
        setNasc,
        cep,
        setCep,
        bio,
        setBio,
        formacaoUsuario,
        setFormacaoUsuario,
        userId,
        setUserId,
        vagaID,
        setVagaID,
        cursosUsuario,
        setCursosUsuarios,
        fotoUsuario,
        setFotoUsuario,

        //Ids Empresa
        empresaId,
        setEmpresaId,
        //Nome empresa
        nomeEmpresa,
        setNomeEmpresa,
        //Ids Chat
        idChat,
        setIdChat
      }}
    >
      {children}
    </Context.Provider>
  );
};
