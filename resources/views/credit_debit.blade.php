@extends('layouts.layout')
<h1>Credit debit</h1>
<!-- another.blade.php -->
<button onclick="redirectToTicketPage()">Go to Ticket Page</button>

<script>
    function redirectToTicketPage() {
        // Redirect the user to the ticket page
        window.location.href = "{{ route('ticket') }}";
    }
</script>