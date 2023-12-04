<?php

namespace App\Http\Controllers;

use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function ConfirmPayment(Request $request) {
        $input = $request->all();

        $pattern = '/([A-Za-z]+)(\d+)([A-Za-z]+)/';
        preg_match($pattern, $input['id'], $matches);
        $input['id'] = "TKT-" . $matches[1] . "-" . $matches[2] . "-" . $matches[3];

        Mail::send('success', $input, function($message) {
            $message->to('axel.ferdinand.88@gmail.com', 'Code Online')
            ->subject('Pembayaran tiket BTX Berhasil');
        });

        // return view('success');
    }
}
