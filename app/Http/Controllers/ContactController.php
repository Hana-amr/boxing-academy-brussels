<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Opslaan in database
        $contact = ContactMessage::create($validated);

        // Mail sturen naar admin
        Mail::raw(
            "Nieuw contactbericht:\n\n".
            "Naam: {$contact->name}\n".
            "E-mail: {$contact->email}\n".
            "Onderwerp: {$contact->subject}\n\n".
            "Bericht:\n{$contact->message}",
            function ($mail) {
                $mail->to('admin@ehb.be')
                    ->subject('Nieuw contactbericht - Boxing Academy Brussels');
            }
        );

        return back()->with('success', 'Je bericht werd succesvol verzonden!');


    }
}
