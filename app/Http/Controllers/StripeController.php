<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function createSession(Request $request)
    {
        $stripeSecretKey = config('services.stripe.secret'); // Or from .env directly
        $stripe = new StripeClient($stripeSecretKey);

        $YOUR_DOMAIN = url('/');

        $checkoutSession = $stripe->checkout->sessions->create([
            'ui_mode' => 'embedded',
            'line_items' => [[
                'price' => $request->input('price_id'), // get from client
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'return_url' => $YOUR_DOMAIN . '/return?session_id={CHECKOUT_SESSION_ID}',
        ]);

        return response()->json(['clientSecret' => $checkoutSession->client_secret]);
    }

    public function retrieveSession(Request $request)
{
    $stripeSecretKey = config('services.stripe.secret'); // Or use env('STRIPE_SECRET')
    $stripe = new \Stripe\StripeClient($stripeSecretKey);

    try {
        $sessionId = $request->input('session_id'); // JSON payload
        $session = $stripe->checkout->sessions->retrieve($sessionId);

        return response()->json([
            'status' => $session->status,
            'customer_email' => $session->customer_details->email ?? null,
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
