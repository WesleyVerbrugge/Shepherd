import React, { useState, useEffect } from "react";
import Calendar from "react-calendar";
import axios from "axios";

function CalendarOverview() {
  const [selectedOptions, setSelectedOptions] = useState({});
  const [clickedDay, setClickedDay] = useState(null);

  useEffect(() => {
    axios
      .get("/api/selected-options")
      .then((response) => {
        setSelectedOptions(response.data);
      })
      .catch((error) => {
        console.error(error);
      });
  }, []);

  const handleDayClick = (day) => {
    setClickedDay(day);
  };

  return (
    <div>
      <Calendar onClickDay={handleDayClick} />
      {clickedDay && (
        <div>
          <h3>Selected options for {clickedDay.toString()}</h3>
          <ul>
            {selectedOptions[clickedDay] &&
              selectedOptions[clickedDay].map((option, index) => (
                <li key={index}>{option}</li>
              ))}
          </ul>
        </div>
      )}
    </div>
  );
}

export default CalendarOverview;
