const paymentForm = document.getElementById("paymentForm");
const paymayaRadio = document.getElementById("paymaya");
const creditRadio = document.getElementById("creditCard");
const debitRadio = document.getElementById("debitCard");

paymentForm.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get the selected payment method
    let paymentMethod;
    if (paymayaRadio.checked) {
        paymentMethod = "paymaya";
    } else if (creditRadio.checked) {
        paymentMethod = "credit";
    } else if (debitRadio.checked) {
        paymentMethod = "debit";
    }

    // Update the form's action attribute with the selected payment method
    paymentForm.action = "/form/" + paymentMethod;
    paymentForm.submit(); // Submit the form
});
