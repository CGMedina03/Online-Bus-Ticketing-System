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
                        Scheduled date and time: <strong>{{ $userInfo->month }} {{ $userInfo->day }}, {{ $userInfo->year }} | {{ $userInfo->time }}</strong>
                    </p>
                    <p class="card-text">Route: <strong>{{ $userInfo->routes }}</strong></p>
                    <p class="card-text">Total: <strong>{{ $userInfo->Total }}</strong></p>
                </div>
            </div>
            <div class="card-footer text-body-secondary">
                <span class="text-muted"><strong>Please take a screenshot before closing. Thank you!</strong></span>
            </div>
        </div>
    </div>

    <!-- script to generate the QR code -->
    <script src="{{ asset('js/qrCodeGenerator.js') }}">
    </script>