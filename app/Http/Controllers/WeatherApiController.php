<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class WeatherApiController extends Controller
{
    public function index()
    {
        $url = 'https://api.openweathermap.org/data/2.5/weather?q=kuressaare&units=metric&appid=' . config('services.weather.key');
        $data = $this->cacheData($url);
        return Inertia::render('Weather', [
            'data' => $data
        ]);
    }

    private function cacheData($url)
    {
        if (!Cache::has('weather')) {
            $query = Http::get($url)->json();
            Cache::put('weather', $query, now()->addHour());
        }
        return Cache::get('weather');
    }
}
