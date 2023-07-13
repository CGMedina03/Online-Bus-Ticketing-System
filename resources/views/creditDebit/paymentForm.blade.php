@extends('layouts.layout')
@section('index')
<style>
    body {
        overflow-x: hidden;
    }

    .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 30px 0;
    }

    .col-75 {
        -ms-flex: 75%; /* IE10 */
        flex: 75%;
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        margin-bottom: 0px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color: #04aa6d;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }
    #general-error{
        font-size: 20px;
        font-weight: bold;
    }
</style>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="/ticket" method="post" onsubmit="return validateForm()">
                @csrf
                <div class="row">
                    <div class="col-50">
                        <h3>Payment</h3>
                        <div class="col-50">
                                <label>Card Type</label>
                                <h4 id="cardtype-display"></h4>
                            </div>
                        <label for="cname">Card name</label>
                        <input type="text" id="cname" name="cardname" placeholder="John More Doe" required />
                        <div id="cname-error" class="error-message"></div>
                        <label for="ccnum">Card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111222233334444" required />
                        <div id="ccnum-error" class="error-message"></div>
                        <label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="1" required />
                        <div id="expmonth-error" class="error-message"></div>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input type="text" id="expyear" name="expyear" placeholder="2018" required />
                                <div id="expyear-error" class="error-message"></div>
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="352" required />
                                <div id="cvv-error" class="error-message"></div>
                            </div>
                            <div class="col-50">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="secbarry1" />
                                <div id="password-error" class="error-message"></div>
                                <span>For the password not enabled, type NA</span>
                            </div>
                            <h2  id="general-error" class="error-message"></h2>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn">Continue to checkout</button>
            </form>
        </div>
    </div>
</div>
<script>
    const validCardNumbers = [
        {
            cardType: "MASTERCARD",
            number: "5123456789012346",
            expiryMonth: "12",
            expiryYear: "2025",
            csc: "111",
            securePassword: "Not enabled",
        },
        {
            cardType: "MASTERCARD",
            number: "5453010000064154",
            expiryMonth: "12",
            expiryYear: "2025",
            csc: "111",
            securePassword: "secbarry1",
        },
        {
            cardType: "VISA",
            number: "4123450131001381",
            expiryMonth: "12",
            expiryYear: "2025",
            csc: "123",
            securePassword: "mctest1",
        },
        {
            cardType: "VISA",
            number: "4123450131001522",
            expiryMonth: "12",
            expiryYear: "2025",
            csc: "123",
            securePassword: "mctest1",
        },
        {
            cardType: "VISA",
            number: "4123450131004443",
            expiryMonth: "12",
            expiryYear: "2025",
            csc: "123",
            securePassword: "mctest1",
        },
        {
            cardType: "VISA",
            number: "4123450131000508",
            expiryMonth: "12",
            expiryYear: "2025",
            csc: "111",
            securePassword: "Not enabled",
        },
    ];

    function validateForm() {
        var cardNameInput = document.getElementById("cname");
        var cardNumberInput = document.getElementById("ccnum");
        var cardTypeDisplay = document.getElementById("cardtype-display");
        var expirationMonthInput = document.getElementById("expmonth");
        var expirationYearInput = document.getElementById("expyear");
        var cvvInput = document.getElementById("cvv");
        var passwordInput = document.getElementById("password");

        var cardName = cardNameInput.value;
        var cardNumber = cardNumberInput.value;
        var expirationMonth = expirationMonthInput.value;
        var expirationYear = expirationYearInput.value;
        var cvv = cvvInput.value;
        var password = passwordInput.value;

        // Clear error messages
        clearError();

        // Validate card name (Title case)
        if (!/^[A-Z][a-z]+(?: [A-Z][a-z]+)*$/.test(cardName)) {
            showError(cardNameInput, "Name should be in Title case.");
            return false;
        }

        // Validate card number (only numbers)
        if (!/^\d+$/.test(cardNumber)) {
            showError(cardNumberInput, "Card number should contain only numbers.");
            return false;
        }

        // Validate expiration month (numbers between 1 and 12)
        if (!/^(0?[1-9]|1[0-2])$/.test(expirationMonth)) {
            showError(expirationMonthInput, "Invalid month.");
            return false;
        }

        // Validate expiration year (2 or 4 digits)
        if (!/^\d{2}(\d{2})?$/.test(expirationYear)) {
            showError(expirationYearInput, "Invalid year.");
            return false;
        }

        // Validate CVV (3 digits)
        if (!/^\d{3}$/.test(cvv)) {
            showError(cvvInput, "Invalid CVV.");
            return false;
        }

        // Check if password is required and validate password
        var validCard = validCardNumbers.find(function (card) {
            return (
                card.number === cardNumber &&
                card.expiryMonth === expirationMonth &&
                card.expiryYear === expirationYear &&
                card.csc === cvv
            );
        });

        if (!validCard) {
            showError(null, "Invalid card account.");
            return false;
        }

        if (validCard.securePassword !== "Not enabled") {
            // Password is enabled, validate the password
            if (password !== validCard.securePassword) {
                showError(passwordInput, "Invalid password.");
                return false;
            }
        } else {
            // Password is not enabled, allow "NA" or empty input
            if (password !== "" && password.toLowerCase() !== "na") {
                showError(passwordInput, "Password is not required.");
                return false;
            }
        }

        // Update the card type display
        cardTypeDisplay.textContent = validCard.cardType;

        return true;
    }

    function showError(element, message) {
        if (element) {
            var errorElementId = element.id + "-error";
            var errorElement = document.getElementById(errorElementId);
            errorElement.textContent = message;
        } else {
            var generalErrorElement = document.getElementById("general-error");
            generalErrorElement.textContent = message;
        }
    }

    function clearError() {
        var errorElements = document.getElementsByClassName("error-message");
        for (var i = 0; i < errorElements.length; i++) {
            errorElements[i].textContent = "";
        }
        var generalErrorElement = document.getElementById("general-error");
        generalErrorElement.textContent = "";
    }

    function updateCardTypeDisplay() {
        var cardNumberInput = document.getElementById("ccnum");
        var cardTypeDisplay = document.getElementById("cardtype-display");
        var cardNumber = cardNumberInput.value;

        var matchedCard = validCardNumbers.find(function (card) {
            return card.number === cardNumber;
        });

        if (matchedCard) {
            cardTypeDisplay.textContent = matchedCard.cardType;
        } else {
            cardTypeDisplay.textContent = "";
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        var cardNumberInput = document.getElementById("ccnum");
        cardNumberInput.addEventListener("input", updateCardTypeDisplay);
    });
</script>
@endsection
