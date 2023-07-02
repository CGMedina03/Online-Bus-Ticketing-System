// Get the element where you want to display the current date and time
const currentDateTimeElement = document.getElementById("currentDateTime");

// Function to format the date as "Month Day, Year" (e.g., "May 30, 2023")
function formatDate(date) {
    const options = {
        month: "long",
        day: "numeric",
        year: "numeric",
    };
    return date.toLocaleDateString(undefined, options);
}

// Function to format the time as "Hour:Minute:Second" (e.g., "10:30:45")
function formatTime(date) {
    const options = {
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
        hour12: false, // Set hour12 to false to use 24-hour format
    };
    return date.toLocaleTimeString(undefined, options);
}

// Function to update the current date and time
function updateDateTime() {
    const currentDateTime = new Date();
    const formattedDate = formatDate(currentDateTime);
    const formattedTime = formatTime(currentDateTime);
    currentDateTimeElement.textContent = `${formattedDate} | ${formattedTime}`;
}

// Update the current date and time initially
updateDateTime();

// Update the current date and time every second
setInterval(updateDateTime, 1000); // Update every second
