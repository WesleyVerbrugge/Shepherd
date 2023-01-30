import MyCalendar from "./components/calendar";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Nav from "./components/nav";
import Login from "./components/login";
import CalendarOverview from "./components/globalCalendar";

// Hier nog een Privateroute maken voor Ingelogde user only.
// Loginpage public maken.
// Andere Route voor PL maken..

function App() {
  return (
    <Router>
      <Nav />
      <Routes>
        <Route path="/login" element={<Login />} />
        <Route path="/calendar" element={<MyCalendar />} />
        <Route path="/overview" element={<CalendarOverview />} />
      </Routes>
    </Router>
  );
}
export default App;
