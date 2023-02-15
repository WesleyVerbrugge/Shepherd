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

  function handleOptionDelete(day, option) {
    setSelectedOptions(
      selectedOptions.filter((item) => {
        return item.day.getTime() !== day.getTime() || item.option !== option;
      })
    );
    setDropdownVisible(false);
    deleteDataFromPHP({ userId, day, option });
  }

  function deleteDataFromPHP(data) {
    axios
      .post("/api/user/delete-selected-option", data)
      .then((res) => {
        console.log(res);
      })
      .catch((err) => {
        console.log(err);
      });
  }

  return (
    <div>
      <Calendar
        onClickDay={handleDayClick}
        tileContent={({ date, view }) => {
          if (view === "month") {
            const selectedOption = selectedOptions.find(
              (item) => item.day.getTime() === date.getTime()
            );
            if (clickedDay && clickedDay.getTime() === date.getTime()) {
              return (
                <button
                  id="deleteDay"
                  onClick={() =>
                    handleOptionDelete(clickedDay, selectedOption.option)
                  }
                >
                  X
                </button>
              );
            } else {
              return selectedOption ? selectedOption.option : null;
            }
          }
        }}
      />
      <div>
        {dropdownVisible && (
          <div>
            <button onClick={() => handleOptionSelect("A")}>Avonddienst</button>
            <button onClick={() => handleOptionSelect("D")}>Dagdienst</button>
            <button onClick={() => handleOptionSelect("V")}>Verlof</button>
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
          <li className="TextSet" key={index}>
            {item.option} on {item.day.toString()}
          </li>
        ))}
      </ul>
    </div>
  );
}

// Data send to php backend... MySql...

function sendDataToPHP(data) {
  axios
    .post("/api/user/save-selected-options", data)
    .then((res) => {
      console.log(res);
    })
    .catch((err) => {
      console.log(err);
    });
}

export default MyCalendar;
