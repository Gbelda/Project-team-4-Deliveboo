<?php

namespace App\Http\Controllers;

use App\Mail\OrderMailable;
use App\Mail\OrderPlaced;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();
        setcookie('token', $token);

        return view('guest.checkout', compact('token'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);

        // ddd($order);

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')

        ]);

        $amount = $request->total;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $request->client_name,
                'lastName' => $request->client_lastname,
                'email' => $request->client_email,
                'phone' => $request->client_phone,
            ],
            'billing' => [
                'firstName' => $request->client_name,
                'lastName' => $request->client_lastname,
                'streetAddress' => $request->client_address,

            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // ddd($result);

        if ($result->success) {
            $transaction = $result->transaction;

            $validated = $request->validate([
                'client_name' => ['required', 'max:50'],
                'client_lastname' => ['required', 'max:50'],
                'client_email' => ['required', 'string', 'email', 'max:255'],
                'client_address' => ['required', 'string',],
                'client_phone' => ['required', 'numeric', 'digits_between:10,15'],
                'total' => ['required', 'numeric'],
                'plates' => ['required'],


            ]);

            $validated['user_id'] = $request->restaurant_id;


            $order = Order::create($validated);

            $restaurant = User::where('id', $request->restaurant_id)->first();
            // ddd($restaurant->email);



            $plates = collect($request->input('plates', []))
                ->map(function ($plate) {
                    return ['quantity' => $plate];
                });

            $order->plates()->sync($plates);

            // Mail::to($restaurant->email)->send(new OrderPlaced);
            // ddd($order);

            Mail::to($restaurant->email)->send(new OrderMailable($order));

            return redirect()->route('guest.paysuccess')->with('message', 'Pagamento avvenuta con successo, Riceverai un email di conferma!');
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return redirect()->back()->withErrors($result->message)->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
