<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(StoreContactMessageRequest $request)
    {
        ContactMessage::create($request->validated());

        $prenom = explode(' ', $request->input('nom'))[0];

        return back()->with('success', "Message envoyé, {$prenom}. Le CNEF vous répondra dans les meilleurs délais.");
    }
}
