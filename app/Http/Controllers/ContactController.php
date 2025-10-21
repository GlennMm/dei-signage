<?php
// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\ContactSubmission;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'faqs' => FAQ::active()->where('category', 'contact')->orderBy('sort_order')->get(),
            'contact_info' => [
                'phone' => SiteSetting::get('contact_phone', '+263 777 372 623'),
                'email' => SiteSetting::get('contact_email', 'enquiry@dei.co.zw'),
                'address' => SiteSetting::get('contact_address', '4 Aberdeen Road, Avondale, Harare'),
                'website' => SiteSetting::get('website_url', 'www.deibrandingandsignage.com'),
            ],
        ];

        return view('contact', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'service_interest' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Save to database
        $submission = ContactSubmission::create($validated);

        try {
            // Send email notification
            Mail::to(SiteSetting::get('contact_email', 'enquiry@dei.co.zw'))
                ->send(new ContactFormMail($submission));

            return back()->with('success', 'Thank you for your message! We will get back to you soon.');
        } catch (\Exception $e) {
            // Log the error but still show success to user
            logger('Contact form email failed: ' . $e->getMessage());
            
            return back()->with('success', 'Thank you for your message! We have received it and will get back to you soon.');
        }
    }
}