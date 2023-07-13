<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- link for css bootstrap -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous"
        />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Card Payment</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #f9f9f9;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-line-pack: center;
                align-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                min-height: 100vh;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                font-family: "Raleway";
            }

            .payment-title {
                width: 100%;
                text-align: center;
            }

            .form-container .field-container:first-of-type {
                grid-area: name;
            }

            .form-container .field-container:nth-of-type(2) {
                grid-area: number;
            }

            .form-container .field-container:nth-of-type(3) {
                grid-area: expiration;
            }

            .form-container .field-container:nth-of-type(4) {
                grid-area: security;
            }

            .field-container input {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            .field-container {
                position: relative;
            }

            .form-container {
                display: grid;
                grid-column-gap: 10px;
                grid-template-columns: auto auto;
                grid-template-rows: 90px 90px 90px;
                grid-template-areas: "name name" "number number" "expiration security";
                max-width: 400px;
                padding: 20px;
                color: #707070;
            }

            label {
                padding-bottom: 5px;
                font-size: 13px;
            }

            input {
                margin-top: 3px;
                padding: 15px;
                font-size: 16px;
                width: 100%;
                border-radius: 3px;
                border: 1px solid #dcdcdc;
            }

            .error-message {
                color: red;
                font-size: 12px;
                margin-top: 5px;
            }

            .error-input {
                border: 1px solid red;
            }

            .ccicon {
                height: 38px;
                position: absolute;
                right: 6px;
                top: calc(50% - 17px);
                width: 60px;
            }

            .container {
                width: 100%;
                max-width: 400px;
                max-height: 251px;
                height: 54vw;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="payment-title">
            <h1>Payment Information</h1>
        </div>
        <div class="container preload">
            <div class="creditcard">
                <div class="form-container">
                    <form
                        action="{{ route('ticket') }}"
                        method="POST"
                        onsubmit="return validateForm()"
                    >
                        @csrf
                        <!-- Include CSRF token for form protection -->
                        <div class="field-container">
                            <label for="name">Name</label>
                            <input
                                id="name"
                                name="name"
                                maxlength="20"
                                type="text"
                            />
                        </div>
                        <div class="field-container">
                            <label for="cardnumber">Card Number</label>
                            <input
                                id="cardnumber"
                                name="cardnumber"
                                type="text"
                                pattern="[0-9]*"
                                inputmode="numeric"
                            />
                            <svg
                                id="ccicon"
                                class="ccicon"
                                width="750"
                                height="471"
                                viewBox="0 0 750 471"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                            ></svg>
                        </div>
                        <div class="field-container">
                            <label for="expirationdate"
                                >Expiration (mm/yy)</label
                            >
                            <input
                                id="expirationdate"
                                name="expirationdate"
                                type="text"
                                pattern="[0-9]*"
                                inputmode="numeric"
                            />
                        </div>
                        <div class="field-container">
                            <label for="securitycode">Security Code</label>
                            <input
                                id="securitycode"
                                name="securitycode"
                                type="text"
                                pattern="[0-9]*"
                                inputmode="numeric"
                            />
                        </div>
                        <button type="submit" class="btn btn-success btn-lg">
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- script for bootstrap -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
