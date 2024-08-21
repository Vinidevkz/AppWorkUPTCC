// COMUNICAÇÂO COM A API

import { useState } from "react";

const [vaga, setVaga] = useState("");
const [loading, setLoading] = useState(true);

export const getVagas = async () => {
  try {
    const response = await fetch(`http://127.0.0.1:8000/api/vaga`);
    const json = await response.json();
    setVaga(json);
  } catch (error) {
    console.error(error);
  }
};


