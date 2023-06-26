<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- link for css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Your ticket</title>
</head>

<body>
    <h3 class="mx-auto my-3 p-1 text-center">Your ticket!</h3>
    <!-- start of the ticket -->
    <div class="container justify-content-center d-flex mt-5">
        <div class="card mb-3" style="max-width: 540px">
            <div class="card-header justify-content-between d-flex">
                <span class="card-title">Thank you! </span>
                <!-- for closing -->
                <button class="btn btn-sm justify-content-end" onclick="navigateToIndex()">
                    <!-- icon for the closing button -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- for qr code generator -->
                    <div id="qrcode" class="d-flex justify-content-center align-items-center m-md-5 mt-3"></div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <!-- displayig Data User Input -->
                        <p class="card-text">Name: <strong> test1 </strong></p>
                        <p class="card-text">Contact number: <strong> 12345 </strong></p>
                        <p class="card-text">Number of Person(s): <strong>2</strong></p>
                        <p class="card-text">
                            Scheduled date: <strong>March 23,2024</strong>
                        </p>
                        <p class="card-text">Time: <strong>10:00 - 12:00</strong></p>
                        <p class="card-text">Route: <strong>Quirino</strong></p>
                        <p class="card-text">Price: <strong>₱600.00</strong></p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-body-secondary d-flex justify-content-between">
                <span class="text-muted"><strong>Please take a screenshot of this before closing. Thank
                        you!</strong></span>
            </div>
        </div>
    </div>

    <!-- script to generate the QR code -->
    <script>
        // Generate the initial QR code
        function generateQRCode() {
            var name = "jose";
            var contactNumber = "12345";
            var numberOfPerson = "2";
            var scheduleDate = "3/23/2024";
            var time = "10:00 - 12:00";
            var route = "Quirino";

            // Prepare the data for the QR code
            var qrCodeData =
                "Name: " +
                name +
                "\nContact number: " +
                contactNumber +
                "\nNumber of Person(s): " +
                numberOfPerson +
                "\nScheduled date: " +
                scheduleDate +
                "\nTime Schedule: " +
                time +
                "\nRoute: " +
                route;

            // Encode the data and generate the QR code URL
            var encodedData = encodeURIComponent(qrCodeData);
            var apiUrl =
                "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" +
                encodedData;

            // Create an image element for the QR code
            var qrCodeImage = document.createElement("img");
            qrCodeImage.src = apiUrl;
            qrCodeImage.alt = "QR Code";

            // Update the QR code display
            qrCodeImage.onload = function() {
                var qrCodeDiv = document.getElementById("qrcode");
                qrCodeDiv.innerHTML = "";
                qrCodeDiv.appendChild(qrCodeImage);
            };
        }

        // Function to navigate back to index.html
        function navigateToIndex() {
            window.location.href = "/";
        }

        // Generate the QR code on page load
        generateQRCode();
    </script>

    <!-- script for bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>