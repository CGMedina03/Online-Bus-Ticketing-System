<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- link for css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Bus Corp. Online Ticket</title>
</head>

<body>
    <!-- Table for datas -->
    <h1 class="text-center text-muted mx-3 mt-3">Bus Corp. Online Ticketing</h1>
    <h3 class="text-center text-success" id="currentDateTime"></h3>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <table class="table table-success table-striped text-uppercase">
                    <thead>
                        <tr>
                            <th scope="col">Time</th>
                            <th scope="col">Route</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>4:00 - 6:00</td>
                            <td>Pampanga</td>
                            <td>₱250.00</td>
                        </tr>
                        <tr>
                            <td>6:00 - 8:00</td>
                            <td>Pangasinan</td>
                            <td>₱300.00</td>
                        </tr>
                        <tr>
                            <td>8:00 - 10:00</td>
                            <td>Nueva Vizcaya</td>
                            <td>₱325.00</td>
                        </tr>
                        <tr>
                            <td>10:00 - 12:00</td>
                            <td>Quirino</td>
                            <td>₱300.00</td>
                        </tr>
                        <tr>
                            <td>12:00 - 14:00</td>
                            <td>Cagayan</td>
                            <td>₱500.00</td>
                        </tr>
                        <tr>
                            <td>14:00 - 16:00</td>
                            <td>Ilocos Sur</td>
                            <td>₱425.00</td>
                        </tr>
                        <tr>
                            <td>16:00 - 18:00</td>
                            <td>Kalinga</td>
                            <td>₱450.00</td>
                        </tr>
                        <tr>
                            <td>18:00 - 20:00</td>
                            <td>Ilocos Norte</td>
                            <td>₱600.00</td>
                        </tr>
                        <tr>
                            <td>20:00 - 22:00</td>
                            <td>Camarines Sur</td>
                            <td>₱375.00</td>
                        </tr>
                        <tr>
                            <td>22:00 - 0:00</td>
                            <td>Sorsogon</td>
                            <td>₱425.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Button for appointment -->
    <div class="container d-flex justify-content-center">
        <a href="form">
            <button type="button" class="btn btn-secondary mt-1 mb-3">
                Appoint now!
            </button>
        </a>
    </div>

    <!-- Contact us -->
    <section class="contactInfo">
        <nav class="navbar bg-body-tertiary justify-content-center mb-3">
            <h3 class="text-success">Contact us for more Information</h3>

            <div class="container">
                <a class="navbar-brand" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                    09237812871
                </a>
                <a class="navbar-brand" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    Bus Corp.
                </a>
                <a class="navbar-brand" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                    @BusCorp.
                </a>
                <a class="navbar-brand" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                        <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                        <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                    </svg>
                    BusCorp@gmail.com
                </a>
            </div>
        </nav>
    </section>
    <!-- script for real-time date and time -->
    <script>
        // Get the element where you want to display the current date and time
        const currentDateTimeElement = document.getElementById("currentDateTime");

        // Function to format the date as "Month Day, Year" (e.g., "May 30, 2023")
        function formatDate(date) {
            const options = {
                month: "long",
                day: "numeric",
                year: "numeric"
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
    </script>
    <!-- script for bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>