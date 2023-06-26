<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userInfo;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => ['required', 'regex:/^09\d{9}$/', 'size:11'],
            'number_of_persons' => 'required|integer',
            'month' => 'required',
            'day' => 'required|integer',
            'year' => 'required|integer',
            'routes' => 'required',
            'payment' => 'required',
        ]);

        // Create a new instance of the Information model
        $information = new userInfo();

        // Assign the form data to the model attributes
        $information->name = $validatedData['name'];
        $information->email = $validatedData['email'];
        $information->mobile = $validatedData['mobile'];
        $information->number_of_persons = $validatedData['number_of_persons'];
        $information->month = $validatedData['month'];
        $information->day = $validatedData['day'];
        $information->year = $validatedData['year'];
        $information->routes = $validatedData['routes'];
        $information->payment = $validatedData['payment'];

        // Save the model to the database
        $information->save();

        // Redirect the user to the TC.blade.php view
        return view('TC');
    }

    public function messages()
    {
        return [
            'mobile.regex' => 'The contact number must start with "09" and have 11 digits.',
        ];
    }
}
