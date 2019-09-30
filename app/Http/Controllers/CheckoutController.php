<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request){

    	// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey('sk_test_7eRW1CmRJdnwmnErvz3Yi93C00AvKSlGUQ');

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = $_POST['stripeToken'];
		$charge = \Stripe\Charge::create([
		    'amount' => 40*100,
		    'currency' => 'usd',
		    'description' => 'Example charge',
		    'source' => $token,
		]);

    	dd($charge);
    }
}
