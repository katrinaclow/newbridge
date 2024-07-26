<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
//            'subject' => 'required|string|max:255',  // Add validateion for subject
            'message' => 'required|string|max:2000',
        ]);

        // Send the email
        Mail::to('contact@newbridgemusic.com')->send(new ContactMail($request->all()));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!')->withFragment('contact');
    }
}
