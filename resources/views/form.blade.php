@extends('layouts.layout')

<!-- contact information -->
<section class="mb-3 mt-3">
    <div class="container-fluid d-flex justify-content-center">
        <div class="m-1 col-7">
            <form action="/form/TC" method="POST">
                @csrf
                <h3 class="text-center mb-4">Contact Information</h3>
                <!-- input for NAME -->
                <div class="mb-3">
                    <label for="InputName" class="form-label">Name: </label>
                    <input type="text" class="form-control" name="name" id="InputName" aria-describedby="userName" required />
                </div>
                <!-- input for EMAIL -->
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="InputEmail1" aria-describedby="emailHelp" required />
                </div>
                <!-- input for CONTACT NUMBER -->
                <div class="mb-3">
                    <label for="InputContact" class="form-label">Contact number:</label>
                    <input type="tel" class="form-control" name="mobile" id="InputNUmber" aria-describedby="contactNumber" pattern="[0-9]{11}" required />
                </div>
                <!-- input for the NUMBER OF PERSONS -->
                <div class="mb-3">
                    <label for="InputPersons" class="form-label">Number of person(s):
                    </label>
                    <input type="number" class="form-control" name="number_of_persons" id="InputPersons" aria-describedby="numberOfPersons" max='30' required />

                </div>

                <!-- Appointment -->
                <section class="mb-5 mt-3">
                    <h3 class="text-center mb-4">Appointment</h3>
                    <div class="container">
                        <div class="row">
                            <!-- date picker -->
                            <div class="col-md-6">
                                <span>Date picker</span>
                                <div class="d-flex">
                                    <!-- selection for YEAR -->
                                    <div class="custom-select-wrapper">
                                        <select class="custom-select" name="year" required>
                                            <option value="0" selected disabled hidden>
                                                Year
                                            </option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>
                                            <option value="2036">2036</option>
                                            <option value="2037">2037</option>
                                            <option value="2038">2038</option>
                                            <option value="2039">2039</option>
                                            <option value="2040">2040</option>
                                        </select>
                                    </div>
                                    <!-- selection for MONTH -->
                                    <div class="custom-select-wrapper mr-1">
                                        <select class="custom-select" name="month" required>
                                            <option value="0" selected disabled hidden>
                                                Month
                                            </option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    <!-- selection for DAY -->
                                    <div class="custom-select-wrapper mr-1">
                                        <select class="custom-select" name="day" required>
                                            <option value="0" selected disabled hidden>
                                                Day
                                            </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <!-- For destination routes -->
                            <div class="col-md-6">
                                <span>Route picker</span>
                                <select class="form-select" aria-label="Default select example" name="routes" required>
                                    <option value="0" selected disabled hidden>
                                        Select a route
                                    </option>
                                    <option value="Pampanga">Pampanga</option>
                                    <option value="Pangasinan">Pangasinan</option>
                                    <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                                    <option value="Quirino">Quirino</option>
                                    <option value="Cagayan">Cagayan</option>
                                    <option value="Ilocos Sur">Ilocos Sur</option>
                                    <option value="Kalinga">Kalinga</option>
                                    <option value="Ilocos Norte">Ilocos Norte</option>
                                    <option value="Camarines Sur">Camarines Sur</option>
                                    <option value="Sorsogon">Sorsogon</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Payment -->
                <section class="mb-5 mt-3 mx-3">
                    <h3 class="text-center mb-4">Payment</h3>
                    <!-- radio for GCASH -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Gcash" name="payment" id="flexRadioDefault1" checked />
                        <label class="form-check-label" for="flexRadioDefault1">
                            Gcash
                        </label>
                    </div>
                    <!-- disabled radio for CREDIT -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault2" disabled />
                        <label class="form-check-label" for="flexRadioDefault2">
                            Credit
                        </label>
                    </div>
                    <!-- disabled radio for DEBIT -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault2" disabled />
                        <label class="form-check-label" for="flexRadioDefault2">
                            Debit
                        </label>
                    </div>
                </section>

                <div class="justify-content-around d-flex align-items-center">
                    <!-- cancel button -->
                    <a href="/" type="submit" class="btn btn-secondary btn-sm">
                        Cancel
                    </a>
                    <!-- submit button -->
                    <button type="submit" class="btn btn-success btn-lg">
                        Proceed
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- script to validate the selected options -->
<script>
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
            alert("Please select a valid date and route."); // Display an error message
        }
    }

    // Add event listener to the form submission
    const form = document.querySelector("form");
    form.addEventListener("submit", validateForm);

    // error handler for the date
    // Get the current date
    const currentDate = new Date();

    // Get the select element for day, month, and year
    const daySelect = document.querySelector(".custom-select-wrapper:nth-child(3) select");
    const monthSelect = document.querySelector(".custom-select-wrapper:nth-child(2) select");
    const yearSelect = document.querySelector(".custom-select-wrapper:nth-child(1) select");

    // Function to disable or remove options that have already passed
    function disablePastDates() {
        // Get the selected year and month
        const selectedYear = parseInt(yearSelect.value);
        const selectedMonth = monthSelect.value;

        // Calculate the maximum day for the selected month and year
        const maximumDay = new Date(selectedYear, new Date(Date.parse(selectedMonth + " 1")).getMonth() + 1, 0).getDate();

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
</script>