<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('iletisim', compact('contactInfo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi! En kısa sürede size dönüş yapacağız.');
    }
}
