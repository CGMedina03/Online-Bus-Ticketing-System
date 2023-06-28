@extends('layouts.layout')

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
                    <p class="card-text">Name: <strong>{{ $userInfo->name }}</strong></p>
                    <p class="card-text">Contact number: <strong>{{ $userInfo->mobile }}</strong></p>
                    <p class="card-text">Number of Person(s): <strong>{{ $userInfo->number_of_persons }}</strong></p>
                    <p class="card-text">
                        Scheduled date: <strong>{{ $userInfo->month }} {{ $userInfo->day }}, {{ $userInfo->year }}</strong>
                    </p>
                    <!-- <p class="card-text">Time: <strong>{{ $userInfo->time }}</strong></p> -->
                    <p class="card-text">Route: <strong>{{ $userInfo->routes }}</strong></p>
                    <p class="card-text">Price: <strong>{{ $userInfo->price }}</strong></p>
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
            var name = "{{ $userInfo->name }}";
            var contactNumber = "{{ $userInfo->mobile }}";
            var numberOfPerson = "{{ $userInfo->number_of_persons }}";
            var scheduleDate = "{{ $userInfo->month }} {{ $userInfo->day }}, {{ $userInfo->year }}";
            // var time = "{{ $userInfo->time }}";
            var route = "{{ $userInfo->routes }}";

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
                // "\nTime Schedule: " +
                // time +
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