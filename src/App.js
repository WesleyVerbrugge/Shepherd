import {
  BrowserRouter as Router,
  Route,
  Routes,
  Navigate,
} from "react-router-dom";
import Nav from "./components/nav";
import Login from "./components/login";
import MyCalendar from "./components/calendar";
import CalendarOverview from "./components/globalCalendar";
import { useState } from "react";

function PrivateRoute({ isAuthenticated, element: Component, ...props }) {
  return isAuthenticated ? (
    <Component {...props} />
  ) : (
    <Navigate to="/" replace />
  );
}

function App() {
  // Eerst op true gezet omdat er nog niet gepraat wordt met backend om auth te doen en response terug te krijgen.
  // false zet alles weer op slot.
  const [isAuthenticated, setIsAuthenticated] = useState(false);

  return (
    <Router>
      <Nav />
      <Routes>
        <Route
          path="/"
          element={<Login setIsAuthenticated={setIsAuthenticated} />}
        />
        <Route
          path="/calendar"
          element={
            <PrivateRoute
              isAuthenticated={isAuthenticated}
              element={MyCalendar}
            />
          }
        />
        <Route
          path="/overview"
          element={
            <PrivateRoute
              isAuthenticated={isAuthenticated}
              element={CalendarOverview}
            />
          }
        />
      </Routes>
    </Router>
  );
}

export default App;
