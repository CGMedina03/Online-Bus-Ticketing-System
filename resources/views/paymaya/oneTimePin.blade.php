<html class="no-js" lang="en" id="theme-paymaya">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>One Time PIN | Maya</title>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robot" content="index,follow" />
    <meta
      name="copyright"
      content="Copyright © 2022 Maya. All rights reserved."
    />
    <meta name="format-detection" content="telephone=no" />

    <link
      type="text/css"
      rel="stylesheet"
      href="https://iam-assets-staging.paymaya.com/maya-connect-ui/2.0.18/styles/main.css"
      charset="UTF-8"
    />

    <script
      type="text/javascript"
      src="https://iam-assets-staging.paymaya.com/maya-connect-ui/2.0.18/scripts/vendor/jquery.min.js"
      charset="UTF-8"
    ></script>
    <script
      type="text/javascript"
      src="https://iam-assets-staging.paymaya.com/maya-connect-ui/2.0.18/scripts/vendor/ued.min.js"
      charset="UTF-8"
    ></script>

    <script
      type="text/javascript"
      src="https://iam-assets-staging.paymaya.com/maya-connect-ui/2.0.18/scripts/reset.js"
      charset="UTF-8"
    ></script>
    <style>
      .form-group {
        margin-bottom: 17px;
      }
      div {
        display: block;
      }
      body {
        font-family: "CerebriSansPro", sans-serif;
        line-height: 1.42857143;
        margin: 0;
        color: #000;
      }
      body,
      input,
      button.btn {
        -webkit-font-smoothing: antialiased !important;
        font-weight: 400;
      }
    </style>
  </head>

  <body data-new-gr-c-s-check-loaded="14.1113.0" data-gr-ext-installed="">
    <div class="wrapper authentication-wrapper">
      <div class="white-container hidden-logo-container">
        <div class="container">
        <form class="form-otp login-otp-form" id="theme-login-otp-" method="POST" action="{{ route('ticket') }}">
             @csrf
            <div
              id="successMessage"
              class="alert-container alert-success"
              role="alert"
              style="display: none"
            ></div>

            <div class="form-group">
              <h2 class="semi-bold">
                One-time <span class="emphasis">PIN</span>
              </h2>

              <p class="long-read">
                Please enter the one-time PIN (OTP) that we sent to

                <span class="">+63 9193890579</span>
              </p>
              <div class="form-fields">
                <div class="otp-fields">
                  <input
                    class="otp-field focusable"
                    type="text"
                    autocomplete="off"
                    inputmode="numeric"
                    id="digit-1"
                    name="digit-1"
                    tabindex="-1"
                    placeholder="—"
                    data-next="digit-2"
                  />
                  <input
                    class="otp-field"
                    type="text"
                    autocomplete="off"
                    inputmode="numeric"
                    id="digit-2"
                    name="digit-2"
                    tabindex="-1"
                    placeholder="—"
                    data-next="digit-3"
                    data-previous="digit-1"
                  />
                  <input
                    class="otp-field"
                    type="text"
                    autocomplete="off"
                    inputmode="numeric"
                    id="digit-3"
                    name="digit-3"
                    tabindex="-1"
                    placeholder="—"
                    data-next="digit-4"
                    data-previous="digit-2"
                  />
                  <input
                    class="otp-field"
                    type="text"
                    autocomplete="off"
                    inputmode="numeric"
                    id="digit-4"
                    name="digit-4"
                    tabindex="-1"
                    placeholder="—"
                    data-next="digit-5"
                    data-previous="digit-3"
                  />
                  <input
                    class="otp-field"
                    type="text"
                    autocomplete="off"
                    inputmode="numeric"
                    id="digit-5"
                    name="digit-5"
                    tabindex="-1"
                    placeholder="—"
                    data-next="digit-6"
                    data-previous="digit-4"
                  />
                  <input
                    class="otp-field"
                    type="text"
                    autocomplete="off"
                    inputmode="numeric"
                    id="digit-6"
                    name="digit-6"
                    tabindex="-1"
                    placeholder="—"
                    data-previous="digit-5"
                  />
                </div>

                <input
                  type="hidden"
                  id="_csrf"
                  name="_csrf"
                  value="369460d2-a5a5-4f63-a237-715383531bc3"
                />
                <input type="hidden" id="otp" name="otp" />
                <div class="button-container">
        <button class="continue-button mdc-button mdc-button--raised verify-button" id="continue" type="button" onclick="validateForm()" disabled>
          <span class="mdc-button__label">Verify</span>
        </button>
      </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="body-footer">
        <div class="container width-max">
          <span>Copyright © 2022 Maya. All rights reserved.</span>
        </div>
      </div>
    </div>

    <div class="site-footer">
      <div class="container width-max">
        <span>Copyright © 2022 Maya. All rights reserved.</span>
      </div>
    </div>
    <script>
 function validateForm() {
    var otpFields = document.getElementsByClassName("otp-field");
    var otpValue = "";

    // Reset error style
    for (var i = 0; i < otpFields.length; i++) {
      otpFields[i].style.borderColor = "";
    }

    // Validate OTP fields
    var expectedDigits = ["1", "2", "3", "4", "5", "6"];
    for (var i = 0; i < otpFields.length; i++) {
      var otpField = otpFields[i];
      var digit = otpField.value.trim();

      // Check if the digit is empty or not a number
      if (digit === "" || isNaN(digit)) {
        otpField.style.borderColor = "red";
        return; // Prevent form submission
      }

      // Check if the digit is correct
      if (digit !== expectedDigits[i]) {
        otpField.style.borderColor = "red";
        return; // Prevent form submission
      }

      otpValue += digit;
    }

    // Store the OTP value in the hidden input field
    document.getElementById("otp").value = otpValue;

    // Submit the form
    document.getElementById("theme-login-otp-").submit();
  }

  var otpFields = document.getElementsByClassName("otp-field");

  // Add event listeners to OTP fields to handle focus and input changes
  for (var i = 0; i < otpFields.length; i++) {
    var otpField = otpFields[i];

    otpField.addEventListener("focus", function () {
      this.select();
    });

    otpField.addEventListener("input", function () {
      var nextFieldId = this.getAttribute("data-next");
      var previousFieldId = this.getAttribute("data-previous");
      var nextField = document.getElementById(nextFieldId);
      var previousField = document.getElementById(previousFieldId);

      if (this.value.length === 1) {
        this.blur();

        if (nextField) {
          nextField.focus();
        }
      } else if (this.value.length === 0 && previousField) {
        previousField.focus();
      }
    });
  }
</script>
    <script
      type="text/javascript"
      src="https://iam-assets-staging.paymaya.com/maya-connect-ui/2.0.18/scripts/main.js"
      charset="UTF-8"
    ></script>
  </body>
</html>
