<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request) {
        $emailHtml = $request->input('html');
        // Mail::to('recipient@example.com')->send(new TestEmail($emailHtml));
        Mail::send([], [], function ($message) use ($emailHtml) {
            $message->to('recipient@example.com')
                ->subject('Your Custom Email')
                ->html($emailHtml);
        });

        return response()->json(['message' => 'Email sent successfully']);
    }
}
