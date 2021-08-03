<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function weather(Request $request){

        $nameCity= ($request->cityName) ? $request->cityName : 'Hanoi';
        $reponse=Http::get('api.openweathermap.org/data/2.5/weather',[
        "q"    =>$nameCity,
        "appid"=>"e7bb0e5f491fc5061005cc183b3b29e4"
        ]);

//        dd($reponse->body());
        $data= json_decode($reponse->body());
//        dd($data);
        $temperature=$data->main->temp-273;
        $weather= $data->weather[0]->main;
        return view('backend.auth.weather', compact('temperature', 'weather'));
    }

}
