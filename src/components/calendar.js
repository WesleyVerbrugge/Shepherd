import React, { useState, useEffect } from "react";
import Calendar from "react-calendar";
import "./calendarStyle.css";
import axios from "axios";

function MyCalendar() {
  const [selectedOptions, setSelectedOptions] = useState([]);
  const [dropdownVisible, setDropdownVisible] = useState(false);
  const [clickedDay, setClickedDay] = useState(null);
  const [userId, setUserId] = useState(null);

  const handleDayClick = (day) => {
    setClickedDay(day);
    setDropdownVisible(true);
  };

  const handleOptionSelect = (option) => {
    setSelectedOptions([...selectedOptions, { day: clickedDay, option }]);
    setDropdownVisible(false);
    // send the data to the PHP backend
    sendDataToPHP({ userId, day: clickedDay, option });
  };

  //   // check if user is logged in, Samen met wesley koppelen aan PHP.
  //   useEffect(() => {
  //     axios.get("/api/user/get-user-data").then((res) => {
  //       if (res.data.loggedIn) {
  //         setUserId(res.data.userId);
  //       } else {
  //         console.log("user not logged in");
  //       }
  //     });
  //   }, []);

  return (
    <div>
      <Calendar onClickDay={handleDayClick} />
      <div>
        {dropdownVisible && (
          <div>
            <button onClick={() => handleOptionSelect("Avond")}>
              Avonddienst
            </button>
            <button onClick={() => handleOptionSelect("Dag")}>Dagdienst</button>
            <button onClick={() => handleOptionSelect("Verlof")}>Verlof</button>
          </div>
        )}
      </div>
      <div>
        <SelectedOptionsList selectedOptions={selectedOptions} />
      </div>
    </div>
  );
}

function SelectedOptionsList({ selectedOptions }) {
  return (
    <div>
      <h3>Selected Options:</h3>
      <ul>
        {selectedOptions.map((item, index) => (
          <li key={index}>
            {item.option} on {item.day.toString()}
          </li>
        ))}
      </ul>
    </div>
  );
}

// Data send to php backend... MySql...

// function sendDataToPHP(data) {
//   axios
//     .post("/api/user/save-selected-options", data)
//     .then((res) => {
//       console.log(res);
//     })
//     .catch((err) => {
//       console.log(err);
//     });
// }

export default MyCalendar;
