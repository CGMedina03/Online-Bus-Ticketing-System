<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Http\Request;


class FormController extends Controller
{
    public function store(Request $request)
    {
        // Define the associative array with destination routes, time, and price
        $routeData = [
            'Pampanga' => [
                'time' => '4:00 - 6:00',
                'price' => '₱250.00',
            ],
            'Pangasinan' => [
                'time' => '6:00 - 8:00',
                'price' => '₱300.00',
            ],
            'Nueva Vizcaya' => [
                'time' => '8:00 - 10:00',
                'price' => '₱325.00',
            ],
            'Quirino' => [
                'time' => '10:00 - 12:00',
                'price' => '₱300.00',
            ],
            'Cagayan' => [
                'time' => '12:00 - 14:00',
                'price' => '₱500.00',
            ],
            'Ilocos Sur' => [
                'time' => '14:00 - 16:00',
                'price' => '₱425.00',
            ],
            'Kalinga' => [
                'time' => '16:00 - 18:00',
                'price' => '₱450.00',
            ],
            'Ilocos Norte' => [
                'time' => '18:00 - 20:00',
                'price' => '₱600.00',
            ],
            'Camarines Sur' => [
                'time' => '20:00 - 22:00',
                'price' => '₱375.00',
            ],
            'Sorsogon' => [
                'time' => '22:00 - 0:00',
                'price' => '₱425.00',
            ],
        ];
        $userInfo = new information();

        $userInfo->name = request('name');
        $userInfo->email = request('email');
        $userInfo->mobile = request('mobile');
        $userInfo->number_of_persons = request('number_of_persons');
        $userInfo->month = request('month');
        $userInfo->day = request('day');
        $userInfo->year = request('year');
        $userInfo->routes = request('routes');
        $userInfo->payment = request('payment');

        // test
        // Perform FCFS algorithm to check ticket availability
        $month = $userInfo->month;
        $day = $userInfo->day;
        $year = $userInfo->year;
        $routes = $userInfo->routes;
        $numberOfPersons = $userInfo->number_of_persons;

        $availableSeats = 30 - information::where('month', $month)
            ->where('day', $day)
            ->where('year', $year)
            ->where('routes', $routes)
            ->sum('number_of_persons');

        if ($availableSeats >= $numberOfPersons) {
            // Retrieve the selected route details from the $routeData associative array
            $routeDetails = $routeData[$userInfo->routes] ?? null;
            if ($routeDetails) {
                $userInfo->time = $routeDetails['time'];
                $userInfo->prices = $routeDetails['price'];

                // Multiply the price by the number of persons
                $price = floatval(str_replace(['₱', ','], '', $routeDetails['price']));
                $totalPrice = $price * $userInfo->number_of_persons;

                // Format the total price with the currency symbol and decimal point
                $formattedTotal = '₱' . number_format($totalPrice, 2);

                $userInfo->Total = $formattedTotal;
            }
            // Sufficient seats available, save the ticket details to the database
            $userInfo->save();
            // Add any necessary success messages or redirects
            return view('ticket', ['userInfo' => $userInfo]);
        } else {
            // Insufficient seats available, display error message with available seats
            if ($availableSeats <= 0) {
                $errorMessage = 'Sorry, all available seats for the requested date and route have been taken.';
            }
            // Insufficient seats available, display error message based on availability
            else {
                $errorMessage = 'Sorry, there are only ' . $availableSeats . ' seats available for the requested date and route.';
            }
            return redirect('/form')->with('error', $errorMessage);
        }

        // test end

    }
}
