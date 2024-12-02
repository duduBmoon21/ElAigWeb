<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\About;
use App\Models\Contact;
use App\Models\Pricing;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        
        $hero = Hero::all(); 
        $contact = Contact::first();
        $abouts = About::whereIn('about_type', ['mission', 'vision', 'goals', 'terms_rules', 'desc'])
                        ->get()
                        ->groupBy('about_type');

        $services = Service::all();
        $pricings = Pricing::where('price', '>', 0)->get();
        $contacts=Contact::all();

        return view('welcome', compact('hero', 'abouts', 'contact','services','pricings','contacts'));
    }
}
