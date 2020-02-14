<?php

namespace App\Http\Controllers;

use App\TravelPackage;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = TravelPackage::with('galleries')->get(); //membuat  relasi di travelpaceke dan galeri ambil fotonya
        return view('pages.home', [
            'items' => $items  //cara meanggil keview
        ]);
    }
}