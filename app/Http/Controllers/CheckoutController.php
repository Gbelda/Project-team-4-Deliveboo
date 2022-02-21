<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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

        $validated = $request->validate([
            'client_name' => ['required', 'max:50'],
            'client_lastname' => ['required', 'max:50'],
            'client_email' => ['required', 'string', 'email', 'max:255'],
            'client_address' => ['required', 'string', ],
            'client_phone' => ['required', 'numeric', 'digits_between:10,15'],
            'total' => ['required', 'numeric'],
            'plates' => ['required'],   


        ]);
        
        $validated['user_id'] = $request->restaurant_id;

        
        $order = Order::create($validated);
        
        ddd($order);


        $plates = collect($request->input('plates', []))
        ->map(function($plate){
            return ['count' => $plate];
        });

        $order->plates()->sync($plates);

        ddd($order);

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
            // header("Location: transaction.php?id=" . $transaction->id);

            return redirect()->intended('/')->with('success_message', 'Il pagamento è avvenuto con successo');
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return redirect()->intended('/')->withErrors('ERRORRE: ' . $result->message);
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
