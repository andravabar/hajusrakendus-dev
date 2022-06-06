<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function api()
    {
        return Inertia::render('API');
    }
    public function Andrus()
    {
        return Inertia::render('Andrus');
    }
}
