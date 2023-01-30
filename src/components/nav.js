import { Link } from "react-router-dom";
import "./navStyle.css";

function Nav() {
  return (
    <nav class="navbar">
      <Link to="/login">Login</Link>
      <Link to="/calendar">MijnKalender</Link>
      <Link to="/overview">Aanwezigheid</Link>
    </nav>
  );
}

export default Nav;
