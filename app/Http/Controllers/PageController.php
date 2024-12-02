<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\About;
use App\Models\Service;
use App\Models\Pricing;
use App\Models\Hero;
use App\Models\HeroStat;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        // Fetch all sections
        $sections = Section::all();

        // Fetch all Home data 
        $homes=Hero::all();
        $homeStat=HeroStat::all();

        // Fetch related data for the About section
        $abouts = About::whereIn('about_type', ['mission', 'vision', 'goals', 'terms_rules', 'desc'])->get()->groupBy('about_type');

        $services = Service::all();
        $pricings = Pricing::all();

        // Return the view with the data
        return view('fronts', [
            'sections'=> $sections,
            'homes'=>$homes,
            'homeStat'=>$homeStat,
            'aboutMission' => $abouts['mission'] ?? collect(),
            'aboutVision' => $abouts['vision'] ?? collect(),
            'aboutGoals' => $abouts['goals'] ?? collect(),
            'aboutTermsRules' => $abouts['terms_rules'] ?? collect(),
            'aboutDescriptions' => $abouts['desc'] ?? collect(),
            'services' => $services,
            'pricings' => $pricings,
           
        ]);
    }


   
}
