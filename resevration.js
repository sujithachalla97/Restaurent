function validateReservationForm() {
  let name = document.getElementById('name').value;
  let date = document.getElementById('date').value;
  let time = document.getElementById('time').value;
  let people = document.getElementById('people').value;

  if (name === "") {
    alert("Name must be filled out");
    return false;
  }
  if (date === "") {
    alert("Date must be selected");
    return false;
  }
  if (time === "") {
    alert("Time must be selected");
    return false;
  }
  if (people === "" || people < 1) {
    alert("Number of people must be at least 1");
    return false;
  }

  reserveTable(name, date, time, people);
  return false; // Prevent form submission
}

function reserveTable(name, date, time, people) {
  // Code to handle reservation logic (e.g., saving to database, displaying confirmation, etc.)
  alert(`Table reserved for ${name} on ${date} at ${time} for ${people} people.`);
}
