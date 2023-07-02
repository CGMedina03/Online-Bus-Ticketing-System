// Function to validate the form before submission
function validateForm(event) {
    const monthSelect = document.querySelector(
        ".custom-select-wrapper:nth-child(1) select"
    );
    const daySelect = document.querySelector(
        ".custom-select-wrapper:nth-child(2) select"
    );
    const yearSelect = document.querySelector(
        ".custom-select-wrapper:nth-child(3) select"
    );
    const routeSelect = document.querySelector(".form-select");

    if (
        monthSelect.value === "0" ||
        daySelect.value === "0" ||
        yearSelect.value === "0" ||
        routeSelect.value === "0"
    ) {
        event.preventDefault(); // Prevent form submission
    }
}

// Add event listener to the form submission
const form = document.querySelector("form");
form.addEventListener("submit", validateForm);

// error handler for the date
// Get the current date
const currentDate = new Date();

// Get the select element for day, month, and year
const daySelect = document.querySelector(
    ".custom-select-wrapper:nth-child(3) select"
);
const monthSelect = document.querySelector(
    ".custom-select-wrapper:nth-child(2) select"
);
const yearSelect = document.querySelector(
    ".custom-select-wrapper:nth-child(1) select"
);

// Function to disable or remove options that have already passed
function disablePastDates() {
    // Get the selected year and month
    const selectedYear = parseInt(yearSelect.value);
    const selectedMonth = monthSelect.value;

    // Calculate the maximum day for the selected month and year
    const maximumDay = new Date(
        selectedYear,
        new Date(Date.parse(selectedMonth + " 1")).getMonth() + 1,
        0
    ).getDate();

    // Remove all options except the default option
    daySelect.innerHTML = "";
    const defaultOption = new Option("Day", "0");
    daySelect.add(defaultOption);

    // Add options for valid dates
    for (let i = 1; i <= maximumDay; i++) {
        const optionDate = new Date(`${selectedMonth} ${i}, ${selectedYear}`);

        if (optionDate >= currentDate) {
            const option = new Option(i, i);
            daySelect.add(option);
        }
    }
}

// Add event listeners to year and month select elements
yearSelect.addEventListener("change", disablePastDates);
monthSelect.addEventListener("change", disablePastDates);

// Call the function initially to disable or remove the options based on the current date
disablePastDates();
