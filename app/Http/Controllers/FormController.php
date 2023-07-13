<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FormController extends Controller
{
    private function getRouteData()
    {
        return [
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
            ]
        ];
    }
    public function store(Request $request, $payment)
    {
        $routeData = $this->getRouteData();

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/09[0-9]{9}/',
            'number_of_persons' => 'required|numeric|max:30',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'routes' => 'required',
            'payment' => 'required', // Validate payment field (radio button)
        ]);

        // If the form validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Perform FCFS algorithm to check ticket availability
        $month = $request->input('month');
        $day = $request->input('day');
        $year = $request->input('year');
        $routes = $request->input('routes');
        $numberOfPersons = $request->input('number_of_persons');

        $availableSeats = 30 - information::where('month', $month)
            ->where('day', $day)
            ->where('year', $year)
            ->where('routes', $routes)
            ->sum('number_of_persons');

        if ($availableSeats >= $numberOfPersons) {
            // Retrieve the selected route details from the $routeData associative array
            $routeDetails = $routeData[$routes] ?? null;
            if ($routeDetails) {
                $userInfo = new information();
                $userInfo->name = $request->input('name');
                $userInfo->email = $request->input('email');
                $userInfo->mobile = $request->input('mobile');
                $userInfo->number_of_persons = $numberOfPersons;
                $userInfo->month = $month;
                $userInfo->day = $day;
                $userInfo->year = $year;
                $userInfo->routes = $routes;
                $userInfo->payment = $request->input('payment');
                $userInfo->time = $routeDetails['time'];
                $userInfo->prices = $routeDetails['price'];

                // Multiply the price by the number of persons
                $price = floatval(str_replace(['₱', ','], '', $routeDetails['price']));
                $totalPrice = $price * $numberOfPersons;

                // Format the total price with the currency symbol and decimal point
                $formattedTotal = '₱' . number_format($totalPrice, 2);

                $userInfo->Total = $formattedTotal;

                // Store the form data in a session
                $request->session()->put('userInfo', $userInfo);

                // Redirect to the appropriate page based on the selected payment
                if ($payment === 'paymaya') {
                    return view('paymaya.paymaya');
                } else {
                    return view('creditDebit.paymentForm');
                }
            }
        }

        // All seats unavailable or insufficient seats available, display error message
        $errorMessage = ($availableSeats <= 0)
            ? 'Sorry, all available seats for the requested date and route have been taken.'
            : 'Sorry, there are only ' . $availableSeats . ' seats available for the requested date and route.';

        return redirect('/form')
            ->with('error', $errorMessage)
            ->withInput($request->except('password', 'password_confirmation'));
    }

    public function show()
    {
        // Retrieve the form data from the session
        $formData = session('userInfo');

        // Create a new information instance
        $userInfo = new Information();
        $userInfo->name = $formData['name'];
        $userInfo->email = $formData['email'];
        $userInfo->mobile = $formData['mobile'];
        $userInfo->number_of_persons = $formData['number_of_persons'];
        $userInfo->month = $formData['month'];
        $userInfo->day = $formData['day'];
        $userInfo->year = $formData['year'];
        $userInfo->routes = $formData['routes'];
        $userInfo->payment = $formData['payment'];
        $routeDetails = $this->getRouteData()[$userInfo->routes] ?? null;
        if ($routeDetails) {
            $userInfo->time = $routeDetails['time'];
            $userInfo->prices = $routeDetails['price'];

            $price = floatval(str_replace(['₱', ','], '', $routeDetails['price']));
            $totalPrice = $price * $userInfo->number_of_persons;
            $formattedTotal = '₱' . number_format($totalPrice, 2);

            $userInfo->Total = $formattedTotal;
        }

        // Save the ticket details to the database
        $userInfo->save();

        // Clear the form data from the session
        session()->forget('userInfo');

        // Pass the form data to the view
        return view('ticket', ['userInfo' => $userInfo]);
    }
    public function getPrice(Request $request)
    {
        $routeData = $this->getRouteData();

        $selectedRoute = $request->input('route');
        $selectedPrice = $routeData[$selectedRoute]['price'] ?? null;

        if ($selectedPrice) {
            return response()->json(['price' => $selectedPrice]);
        } else {
            return response()->json(['error' => 'Price not found for the selected route.']);
        }
    }
}