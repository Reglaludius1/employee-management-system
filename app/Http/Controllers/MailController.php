<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Models\GenericMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create() {
        $this->authorize('create-mail', Auth::user());

        return view('mail/create');
    }

    public function send(SendMailRequest $request) {
        $this->authorize('send-mail', Auth::user());

        $data = ['message' => 'Sending a mail!'];

        Mail::to($request->get('mail'))->send(new GenericMail($data));

        return redirect()->route('mail.create');
    }
}
