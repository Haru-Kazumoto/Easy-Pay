<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function __construct()
    {
        //
    }

    public function indexHistory() 
    {
        return Inertia::render("Payment/IndexHistory");
    }

    public function show(int $id)
    {
        return Inertia::render("Payment/Show", [
            'id' => $id
        ]);
    }
}
