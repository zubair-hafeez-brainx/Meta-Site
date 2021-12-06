<?php

namespace App\Services;

use App\Models\Ballance;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class StripePayment
{
    protected $price;
    protected $data;

    /**
     * DirectPayment constructor.
     * @param array $data
     * @param float $price
     */
    public function __construct(array $data, float $price)
    {
        $this->price = $price;
        $this->data = $data;
    }

    /**
     * @return \Stripe\Charge|void
     */
    public final function pay()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $this->data['card_number'],
                    'exp_month' => substr($this->data['expire'], 0, 2),
                    'exp_year' => substr($this->data['expire'], 3),
                    'cvc' => $this->data['cvv2'],
                ],
            ]);
            if (!isset($token['id'])) {
                validationException('error', 'Your card is invalid please try again.');
            }

            $charge = \Stripe\Charge::create([
                'card' => $token['id'],
                'currency' => 'USD',
                'amount' => $this->price * 100,
                'description' => 'Paying for the package subscription',
            ]);

            if ($charge['status'] == 'succeeded') {
                return $charge;
            } else {
                \Illuminate\Validation\validationException('error', 'Money not add in wallet!!');
            }
        } catch (\Exception $e) {
            \Illuminate\Validation\ValidationException('error', $e->getMessage());
        }
    }

    /**
     * @param $details
     * @return Payment
     */
    public function storeStripePayment($details)
    {
        $user = auth()->user();
        $payment = new Payment();
        $payment->user_id = $user->id;
        $payment->charge_id = $details['id'];
        $payment->type = $details['payment_method_details']['type'];
        $payment->card_id = $details['source']['id'];
        $payment->card_crypt = Crypt::encryptString($user->first_name . ' ' . $user->last_name . ' ' . substr(strval($details['card_number']), 0, 5));
        $payment->amount = $details['amount'] / 100;
        $payment->balance_transaction = $details['balance_transaction'];
        $payment->captured = $details['captured'];
        $payment->currency = $details['currency'];
        $payment->description = $details['description'];
        $payment->disputed = $details['disputed'];
        $payment->seller_message = $details['outcome']['seller_message'];
        $payment->paid = $details['paid'];
        $payment->status = $details['status'];
        $payment->receipt_url = $details['receipt_url'];
        $payment->log = json_encode($details);
        $payment->timestamp = date("Y-m-d H:i:s", $details['created']);
        $payment->save();
        return $payment;
    }

    /**
     * @param $price
     * @return float|int
     */
    public function updateAccountBallance($price)
    {
        $user = auth()->user();
        $account = Ballance::where('user_id', $user->id)->first();
        if ($account) {
            $account->balance = $price;
            $account->update();
        } else {
            $account = new Ballance();
            $account->user_id = $user->id;
            $account->balance = $price;
            $account->save();
        }
        return $account;
    }
}
