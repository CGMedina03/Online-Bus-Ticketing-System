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
                    <input type="number" class="form-control{{ $errors->has('number_of_persons') ? ' is-invalid' : '' }}" name="number_of_persons" id="InputPersons" aria-describedby="numberOfPersons" max="30" placeholder="e.g. 5" value="{{ old('number_of_persons') }}" />
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
                                            <option value="2023" {{ old('year') == '2023' ? ' selected' : '' }}>2023</option>
                                            <option value="2024" {{ old('year') == '2024' ? ' selected' : '' }}>2024</option>
                                            <option value="2025" {{ old('year') == '2025' ? ' selected' : '' }}>2025</option>
                                            <option value="2026" {{ old('year') == '2026' ? ' selected' : '' }}>2026</option>
                                            <option value="2027" {{ old('year') == '2027' ? ' selected' : '' }}>2027</option>
                                            <option value="2028" {{ old('year') == '2028' ? ' selected' : '' }}>2028</option>
                                            <option value="2029" {{ old('year') == '2029' ? ' selected' : '' }}>2029</option>
                                            <option value="2030" {{ old('year') == '2030' ? ' selected' : '' }}>2030</option>
                                            <option value="2031" {{ old('year') == '2031' ? ' selected' : '' }}>2031</option>
                                            <option value="2032" {{ old('year') == '2032' ? ' selected' : '' }}>2032</option>
                                            <option value="2033" {{ old('year') == '2033' ? ' selected' : '' }}>2033</option>
                                            <option value="2034" {{ old('year') == '2034' ? ' selected' : '' }}>2034</option>
                                            <option value="2035" {{ old('year') == '2035' ? ' selected' : '' }}>2035</option>
                                            <option value="2036" {{ old('year') == '2036' ? ' selected' : '' }}>2036</option>
                                            <option value="2037" {{ old('year') == '2037' ? ' selected' : '' }}>2037</option>
                                            <option value="2038" {{ old('year') == '2038' ? ' selected' : '' }}>2038</option>
                                            <option value="2039" {{ old('year') == '2039' ? ' selected' : '' }}>2039</option>
                                            <option value="2040" {{ old('year') == '2040' ? ' selected' : '' }}>2040</option>
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
                                            <option value="January" {{ old('month') == 'January' ? ' selected' : '' }}>January</option>
                                            <option value="February" {{ old('month') == 'February' ? ' selected' : '' }}>February</option>
                                            <option value="March" {{ old('month') == 'March' ? ' selected' : '' }}>March</option>
                                            <option value="April" {{ old('month') == 'April' ? ' selected' : '' }}>April</option>
                                            <option value="May" {{ old('month') == 'May' ? ' selected' : '' }}>May</option>
                                            <option value="June" {{ old('month') == 'June' ? ' selected' : '' }}>June</option>
                                            <option value="July" {{ old('month') == 'July' ? ' selected' : '' }}>July</option>
                                            <option value="August" {{ old('month') == 'August' ? ' selected' : '' }}>August</option>
                                            <option value="September" {{ old('month') == 'September' ? ' selected' : '' }}>September</option>
                                            <option value="October" {{ old('month') == 'October' ? ' selected' : '' }}>October</option>
                                            <option value="November" {{ old('month') == 'November' ? ' selected' : '' }}>November</option>
                                            <option value="December" {{ old('month') == 'December' ? ' selected' : '' }}>December</option>
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
                                            <option value="1" {{ old('day') == '1' ? ' selected' : '' }}>1</option>
                                            <option value="2" {{ old('day') == '2' ? ' selected' : '' }}>2</option>
                                            <option value="3" {{ old('day') == '3' ? ' selected' : '' }}>3</option>
                                            <option value="4" {{ old('day') == '4' ? ' selected' : '' }}>4</option>
                                            <option value="5" {{ old('day') == '5' ? ' selected' : '' }}>5</option>
                                            <option value="6" {{ old('day') == '6' ? ' selected' : '' }}>6</option>
                                            <option value="7" {{ old('day') == '7' ? ' selected' : '' }}>7</option>
                                            <option value="8" {{ old('day') == '8' ? ' selected' : '' }}>8</option>
                                            <option value="9" {{ old('day') == '9' ? ' selected' : '' }}>9</option>
                                            <option value="10" {{ old('day') == '10' ? ' selected' : '' }}>10</option>
                                            <option value="11" {{ old('day') == '11' ? ' selected' : '' }}>11</option>
                                            <option value="12" {{ old('day') == '12' ? ' selected' : '' }}>12</option>
                                            <option value="13" {{ old('day') == '13' ? ' selected' : '' }}>13</option>
                                            <option value="14" {{ old('day') == '14' ? ' selected' : '' }}>14</option>
                                            <option value="15" {{ old('day') == '15' ? ' selected' : '' }}>15</option>
                                            <option value="16" {{ old('day') == '16' ? ' selected' : '' }}>16</option>
                                            <option value="17" {{ old('day') == '17' ? ' selected' : '' }}>17</option>
                                            <option value="18" {{ old('day') == '18' ? ' selected' : '' }}>18</option>
                                            <option value="19" {{ old('day') == '19' ? ' selected' : '' }}>19</option>
                                            <option value="20" {{ old('day') == '20' ? ' selected' : '' }}>20</option>
                                            <option value="21" {{ old('day') == '21' ? ' selected' : '' }}>21</option>
                                            <option value="22" {{ old('day') == '22' ? ' selected' : '' }}>22</option>
                                            <option value="23" {{ old('day') == '23' ? ' selected' : '' }}>23</option>
                                            <option value="24" {{ old('day') == '24' ? ' selected' : '' }}>24</option>
                                            <option value="25" {{ old('day') == '25' ? ' selected' : '' }}>25</option>
                                            <option value="26" {{ old('day') == '26' ? ' selected' : '' }}>26</option>
                                            <option value="27" {{ old('day') == '27' ? ' selected' : '' }}>27</option>
                                            <option value="28" {{ old('day') == '28' ? ' selected' : '' }}>28</option>
                                            <option value="29" {{ old('day') == '29' ? ' selected' : '' }}>29</option>
                                            <option value="30" {{ old('day') == '30' ? ' selected' : '' }}>30</option>
                                            <option value="31" {{ old('day') == '31' ? ' selected' : '' }}>31</option>
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
                                <select class="form-select{{ $errors->has('routes') ? ' is-invalid' : '' }}" aria-label="Default select example" name="routes">
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
                    <!-- radio for GCASH -->
                    <div class="form-check">
                        <input class="form-check-input{{ $errors->has('payment') ? ' is-invalid' : '' }}" type="radio" value="Paymaya" name="payment" id="paymaya" />
                        <label class="form-check-label" for="paymaya">
                            Paymaya
                        </label>
                        @error('payment')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </label>

                    </div>
                    <!--  radio for CREDIT -->
                    <div class="form-check">
                        <input class="form-check-input{{ $errors->has('payment') ? ' is-invalid' : '' }}" type="radio" name="payment" value="Credit" id="creditCard" />
                        <label class="form-check-label" for="creditCard">
                            Credit
                        </label>
                        @error('payment')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!--  radio for DEBIT -->
                    <div class="form-check">
                        <input class="form-check-input{{ $errors->has('payment') ? ' is-invalid' : '' }}" type="radio" name="payment" value="Debit" id="debitCard" />
                        <label class="form-check-label" for="debitCard">
                            Debit
                        </label>
                        @error('payment')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
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
                </section>

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
<!-- script to validate the selected options -->
<script src="{{ asset('js/validateDate.js') }}"></script>
<script src="{{ asset('js/gatewayRoute.js') }}"></script>