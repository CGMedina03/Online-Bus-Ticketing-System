<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Http\Request;


class FormController extends Controller
{
    public function store(Request $request)
    {
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

        $userInfo->save();
        return view('ticket', ['userInfo' => $userInfo]);
    }
}
