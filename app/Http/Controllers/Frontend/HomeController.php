<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function home() {
        return view('Frontend.Pages.home');
    }

    public function appointment_page(){
        return view('Frontend.Pages.appointmen');
    }
}
