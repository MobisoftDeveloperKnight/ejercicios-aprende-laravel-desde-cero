<?php

namespace App\Http\Controllers;

use App\View\Components\Alert;

class StripeController extends Controller
{
    public function checkout() {
        return auth()->user()
            ->newSubscription('default', config('stripe.price_id'))
            ->checkout();
    }

    public function billingPortal() {
        
        $billing = auth()->user()->redirectToBillingPortal();
        error_log($billing);
        return $billing;
    }

    public function freeTrialEnd() {
        return view('free-trial-end');
    }
}