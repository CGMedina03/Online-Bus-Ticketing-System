// Generate the initial QR code
function generateQRCode() {
    var name = "{{ $userInfo->name }}";
    var contactNumber = "{{ $userInfo->mobile }}";
    var numberOfPerson = "{{ $userInfo->number_of_persons }}";
    var scheduleDate =
        "{{ $userInfo->month }} {{ $userInfo->day }}, {{ $userInfo->year }}";
    var time = "{{ $userInfo->time }}";
    var route = "{{ $userInfo->routes }}";
    var total = "{{ $userInfo->Total }}";

    // Prepare the data for the QR code
    var qrCodeData =
        "Name: " +
        name +
        "\nContact number: " +
        contactNumber +
        "\nNumber of Person(s): " +
        numberOfPerson +
        "\nScheduled date and time: " +
        scheduleDate +
        " | " +
        time +
        "\nRoute: " +
        route +
        "\nTotal: " +
        total;

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
    qrCodeImage.onload = function () {
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
