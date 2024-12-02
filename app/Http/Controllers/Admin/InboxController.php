<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
class InboxController extends Controller
{
    //

     // Show the Inbox form
     public function index()
     {
         return view('fronts');
     }
 
     // Store Inbox form submission
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255',
             'subject' => 'required|string|max:255',
             'message' => 'required|string',
         ]);
     
         // Store the form data
         Inbox::create($request->all());
     
         // Redirect back with success message
         $timeOfDay = now()->format('H');
         $greeting = $timeOfDay < 12 ? 'morning' : ($timeOfDay < 18 ? 'afternoon' : 'evening');
         return back()->with('success', "Thank you for your message! We will reply soon. Have a nice $greeting!");
     }
     
 
     // View all messages in the admin panel
     public function inbox()
     {
        abort_if(Gate::denies('inbox_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $messages = Inbox::latest()->get();
 
         return view('admin.inbox.inbox', compact('messages'));
     }
}
