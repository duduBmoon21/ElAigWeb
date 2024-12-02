<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function home() {
        return view('home');
    }

    public function about() {
        return view('about.index');
    }

    public function services() {
        return view('services.index');
    }

    public function pricing() {
        return view('pricing');
    }

    public function contact() {
        return view('contact');
    }

    // For About Section (dynamic content)
    public function mission($id) {
        $about = About::findOrFail($id);
        return view('about.mission', compact('about'));
    }

    public function vision($id) {
        $about = About::findOrFail($id);
        return view('about.vision', compact('about'));
    }

    public function goals($id) {
        $about = About::findOrFail($id);
        return view('about.goals', compact('about'));
    }

    public function termsRules($id) {
        $about = About::findOrFail($id);
        return view('about.termsRules', compact('about'));
    }

    public function description($id) {
        $about = About::findOrFail($id);
        return view('about.description', compact('about'));
    }

    // For Services Section (dynamic content)
    public function show($id) {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }
}
