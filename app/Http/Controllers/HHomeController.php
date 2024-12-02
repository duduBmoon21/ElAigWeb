<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\About;
use App\Models\Inbox;
use App\Models\Contact;
use App\Models\Pricing;
use App\Models\Service;
use App\Models\HeroStat;
use App\Models\ShowRoom;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HHomeController extends Controller
{
    public function index()
    {

        $hero = Hero::all();
        $heroStat = HeroStat::all();
        $contact = Contact::first();
        $abouts = About::whereIn('about_type', ['mission', 'vision', 'goals', 'terms_rules', 'desc'])
            ->get()
            ->groupBy('about_type');

        $services = Service::all();
        $pricings = Pricing::where('price', '>', 0)->get();
        $contacts = Contact::all();
        $testimonials = Testimonial::all();
        $showRooms = ShowRoom::all();
        return view('fronts', compact('hero', 'abouts', 'contact', 'services', 'pricings', 'contacts', 'heroStat', 'testimonials', 'showRooms'));
    }


    public function create()
    {

        return view('fronts');
    }

    // Store contact form submission
    public function storeContact(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $feedback = new Inbox();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;
        $feedback->save();

        // Inbox::create($request->all());

        // Return a success message back to the view
        return back()->with('success', 'Thank you for your message! We will reply soon.');
    }
}
