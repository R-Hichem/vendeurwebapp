<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderInfoMail extends Mailable
{
    use Queueable, SerializesModels;

      /**
     * The order instance.
     *
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @param  \App\Order  $order
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
         return $this->from('mail@example.com', 'Mailtrap')
            ->subject('Order Information')
            ->markdown('mails.exmpl')
            ->with([
                'name' => $this->order->client_name,
                'code' => $this->order->code,
                'link' => env('APP_URL').'/order_status'
            ]);
    }
}