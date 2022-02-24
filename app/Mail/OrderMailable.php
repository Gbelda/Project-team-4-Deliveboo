<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@deliveboo.com')->markdown('emails.orderEmail')->with([
            'name' => $this->order->client_name,
            'lastname' => $this->order->client_lastname,
            'address' => $this->order->client_address,
            'email' => $this->order->client_email,
            'phone' => $this->order->client_phone,
                


        ])->subject('Ordine #' . $this->order->id);
    }
}
