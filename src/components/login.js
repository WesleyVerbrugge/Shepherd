import React, { useState } from "react";
import "./loginstyle.css";

// under construction
// backend Token check ( user ) needs to be done in handlesubmit.
//

function Login() {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");

  function handleSubmit(event) {
    event.preventDefault();
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
    </form>
  );
}

export default Login;
