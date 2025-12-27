<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class AdminContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contact.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact.show', compact('contactMessage'));
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Contactbericht verwijderd.');
    }
}
