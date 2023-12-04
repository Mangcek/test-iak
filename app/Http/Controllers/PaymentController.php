<?php

namespace App\Http\Controllers;

use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function ConfirmPayment(Request $request) {
        $input = $request->all();

        $data = [
            'payment_code' => $input['id'],
            'amount' => (int) $input['price'],
            'name' => $input['name']
        ];

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->withBody(json_encode($data), 'application/json')->post('https://do27w.wiremockapi.cloud/pay/validate');

        // Ganti ID jadi ID Ticket
        $pattern = '/([A-Za-z]+)(\d+)([A-Za-z]+)/';
        preg_match($pattern, $input['id'], $matches);
        $input['id'] = "TKT-" . $matches[1] . "-" . $matches[2] . "-" . $matches[3];

        // Cek status
        if($response->status() == 201) {
            // Kirim email
            Mail::send('success', $input, function($message) {
                $message->to('axel.ferdinand.88@gmail.com', 'Code Online')
                ->subject('Pembayaran tiket BTX Berhasil');
            });
        }

        return "Pembayaran Berhasil";
    }
}
