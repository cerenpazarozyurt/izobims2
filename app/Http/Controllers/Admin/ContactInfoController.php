<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contactInfo = ContactInfo::first();
        if (!$contactInfo) {
            $contactInfo = ContactInfo::create([
                'phone' => '',
                'email' => '',
                'address' => '',
            ]);
        }
        return view('admin.contact-info.edit', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        $contactInfo = ContactInfo::first();
        if (!$contactInfo) {
            ContactInfo::create($validated);
        } else {
            $contactInfo->update($validated);
        }

        return redirect()->route('admin.contact-info.edit')->with('success', 'İletişim bilgileri başarıyla güncellendi.');
    }
}
