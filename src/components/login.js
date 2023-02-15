import React, { useState } from "react";
import "./loginstyle.css";
import axios from "axios";

function Login({ setIsAuthenticated }) {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");

  async function handleSubmit(event) {
    event.preventDefault();

    try {
      const response = await axios.post("/api/login", { username, password });
      setIsAuthenticated(true);
    } catch (error) {
      console.error(error);
      setError("An error occurred during login");
    }
  }

  return (
    <form className="login-form" onSubmit={handleSubmit}>
      <label>
        Username:
        <input
          type="text"
          value={username}
          onChange={(event) => setUsername(event.target.value)}
        />
      </label>
      <br />
      <label>
        Password:
        <input
          type="password"
          value={password}
          onChange={(event) => setPassword(event.target.value)}
        />
      </label>
      <br />
      <button type="submit">Log in</button>
      {error && <div className="error-message">{error}</div>}
    </form>
  );
}

export default Login;
