@extends('layouts.layout')

<!-- contact information -->
<section class="mb-3 mt-3">
    <div class="container-fluid d-flex justify-content-center">
        <div class="m-1 col-sm-10 col-md-7">
            <form action="/form" method="POST" id="paymentForm">
                @csrf
                <h3 class="text-center mb-4">Contact Information</h3>
                <!-- Add this code wherever you want to display the error message -->
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <!-- input for NAME -->
                <div class="mb-3">
                    <label for="InputName" class="form-label">Name:</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="InputName" aria-describedby="userName" placeholder="e.g. Jose Rizal" value="{{ old('name') }}" />
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
                <!-- input for EMAIL -->
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="InputEmail1" aria-describedby="emailHelp" placeholder="e.g. jose@gmail.com" value="{{ old('email') }}" />
                    @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
                <!-- input for CONTACT NUMBER -->
                <div class="mb-3">
                    <label for="InputContact" class="form-label">Contact number:</label>
                    <input type="tel" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="InputNUmber" aria-describedby="contactNumber" pattern="09[0-9]{9}" placeholder="e.g. 09876543217" value="{{ old('mobile') }}" />
                    @if ($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                    @endif
                </div>
                <!-- input for the NUMBER OF PERSONS -->
                <div class="mb-3">
                    <label for="InputPersons" class="form-label">Number of person(s):</label>
                    <input type="number" class="form-control{{ $errors->has('number_of_persons') ? ' is-invalid' : '' }}" name="number_of_persons" id="InputPersons" aria-describedby="numberOfPersons" max="30" placeholder="e.g. 5" value="{{ old('number_of_persons') }}" oninput="calculate()"/>
                    @if ($errors->has('number_of_persons'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_persons') }}
                    </div>
                    @endif
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
                                        <select class="custom-select{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year">
                                        <option value="0" disabled hidden selected>Year</option>
                                    @php
                                        $currentYear = date('Y');
                                        $endYear = $currentYear + 20;
                                    @endphp
                                    @for ($year = $currentYear; $year <= $endYear; $year++)
                                        <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor

                                        </select>
                                        @error('year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- selection for MONTH -->
                                    <div class="custom-select-wrapper mr-1">
                                        <select class="custom-select{{ $errors->has('month') ? ' is-invalid' : '' }}" name="month">
                                        <option value="0" disabled hidden selected>Month</option>
                                    @php
                                        $months = [
                                            'January', 'February', 'March', 'April', 'May', 'June',
                                            'July', 'August', 'September', 'October', 'November', 'December'
                                        ];
                                    @endphp
                                    @foreach ($months as $month)
                                        <option value="{{ $month }}" {{ old('month') == $month ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                        </select>
                                        @error('month')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- selection for DAY -->
                                    <div class="custom-select-wrapper mr-1">
                                        <select class="custom-select{{ $errors->has('day') ? ' is-invalid' : '' }}" name="day">
                                            <option value="0" disabled hidden selected>Day</option>
                                            @foreach(range(1, 31) as $day)
                                                <option value="{{ $day }}" {{ old('day') == $day ? ' selected' : '' }}>{{ $day }}</option>
                                            @endforeach
                                        </select>
                                        @error('day')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- For destination routes -->
                            <div class="col-md-6">
                                <span>Route picker</span>
                                <select class="form-select{{ $errors->has('routes') ? ' is-invalid' : '' }}" aria-label="Default select example" name="routes" onchange="calculate()" id="selectRoutes">
                                <option value="0" selected disabled hidden>
                                         Select a route
                                </option>
                                @foreach(['Pampanga', 'Pangasinan', 'Nueva Vizcaya', 'Quirino', 'Cagayan', 'Ilocos Sur', 'Kalinga', 'Ilocos Norte', 'Camarines Sur', 'Sorsogon'] as $route)
                                    <option value="{{ $route }}" {{ old('routes') == $route ? 'selected' : '' }}>{{ $route }}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('routes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('routes') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
                                <!-- Payment -->
                    <section class="mb-5 mt-3 mx-3">
                        <h3 class="text-center mb-4">Payment</h3>
                        <h5> <div id="result"></div></h5>
                                          <!-- radio for PAYMAYA -->
                        <div class="form-check">
                            <input class="form-check-input{{ $errors->has('payment') ? ' is-invalid' : '' }}" type="radio" value="Paymaya" name="payment" id="paymaya" {{ old('payment') == 'Paymaya' ? 'checked' : '' }} />
                            <label class="form-check-label" for="paymaya">
                                Paymaya
                            </label>
                            @error('payment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- radio for CREDIT -->
                        <div class="form-check">
                            <input class="form-check-input{{ $errors->has('payment') ? ' is-invalid' : '' }}" type="radio" name="payment" value="Credit" id="creditCard" {{ old('payment') == 'Credit' ? 'checked' : '' }} />
                            <label class="form-check-label" for="creditCard">
                                Credit
                            </label>
                            @error('payment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- radio for DEBIT -->
                        <div class="form-check">
                            <input class="form-check-input{{ $errors->has('payment') ? ' is-invalid' : '' }}" type="radio" name="payment" value="Debit" id="debitCard" {{ old('payment') == 'Debit' ? 'checked' : '' }} />
                            <label class="form-check-label" for="debitCard">
                                Debit
                            </label>
                            @error('payment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </section>

                    <!-- checkbox for ACCEPTING TERMS AND CONDITION -->
                    <div class="form-check my-3">
                        <input class="form-check-input{{ $errors->has('flexCheckChecked') ? ' is-invalid' : '' }}" type="checkbox" value="" id="flexCheckChecked" checked name="flexCheckChecked" required />
                        <label class="form-check-label" for="flexCheckChecked">
                            I have read and understand all
                            <a href="/form/terms-and-conditions" data-bs-toggle="modal" data-bs-target="#Modal">term and Conditions</a>
                        </label>
                        @error('flexCheckChecked')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                <div class="justify-content-around d-flex align-items-center">
                    <!-- cancel button -->
                    <a href="/" type="submit" class="btn btn-secondary btn-sm">
                        Cancel
                    </a>
                    <!-- submit button -->
                    <button type="submit" class="btn btn-success btn-lg d-none d-lg-inline-block">Proceed</button>
                    <button type="submit" class="btn btn-success d-inline-block d-lg-none">Proceed</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function calculate() {
        // Get the user input and selected value
        const userInput = parseInt(document.getElementById("InputPersons").value);
        const selectValue = document.getElementById("selectRoutes").value;

        // Fetch the price data from the server
        $.ajax({
            url: "/get-price",
            method: "GET",
            data: {route: selectValue},
            success: function(response) {
                const price = parseFloat(response.price.replace('₱', '').replace(',', ''));
                const result = userInput * price;
                document.getElementById("result").textContent = "Total price: ₱" + result.toFixed(2);
            },
            error: function() {
                console.log("Error occurred while fetching price data.");
            }
        });
    }

    // Call the calculate function initially to show the result if there's any initial value
    calculate();
</script>
<!-- script to validate the selected options -->
<script src="{{ asset('js/validateDate.js') }}"></script>
<script src="{{ asset('js/gatewayRoute.js') }}"></script>