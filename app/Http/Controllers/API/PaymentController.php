<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ballance;
use App\Models\Payment;
use App\Models\Settings;
use App\Services\StripePayment;
use App\Services\Traits\Filter;
use App\Services\Traits\Search;
use App\Services\Traits\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PaymentController extends Controller
{
    use Sort;
    use Filter;
    use Search;

    /**
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request) {
        $payments = Payment::query()->where('user_id', auth()->user()->id);
        $payments = $this->search($payments, ['charge_id', 'balance_transaction', 'amount', 'created_at']);

        if ($request->has('direction')) {
            $columns = $this->sortables($request);
            $payments = $this->sort($payments, $columns, $request->get('direction'));
        } else {
            $payments = $payments->orderBy('created_at', 'asc');
        }

        $payments = $payments->orderBy('created_at', 'asc')->paginate(100);
        $params = $request->all();
        $ballance = Ballance::where('user_id', auth()->user()->id)->first();

        return Inertia::render('Subscription/show', [
            'payments' => $payments->withQueryString(),
            'customer' => auth()->user(),
            'ballance' => $ballance,
            'params' => $params
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'card_type' => ['required', 'string'],
            'card_number' => ['required', 'integer'],
            'expire' => ['date_format:m-Y'],
            'cvv2' => ['required', 'integer'],
        ]);
        $card = $request->all();

        $setting = Settings::where('name','Package Price')->first();

        $payment = new StripePayment($card, $setting->value);
        $data = $payment->pay();

        $data['card_number'] = strval($request->card_number);
        $storePayment = $payment->storeStripePayment($data);
        $payment->updateAccountBallance($setting->value);

        return Redirect::route('payments.show')->with('success', 'User payment created successfully.');
    }
}
