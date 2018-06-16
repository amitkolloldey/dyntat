<?php

namespace App\Mail;

use App\OrderDetail;
use App\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;

class OrderShipped extends Mailable
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
        $order = $this->order;
        $tests = OrderDetail::where('order_id', $this->order->id)->get();
        $sum = Payment::where('order_id', $this->order->id)->sum('currency_amount');
        $payment = Payment::where('order_id', $this->order->id)->get();
        return $this->subject('Your order has been placed successfully')->markdown('mail.orders.shipped')
            ->with('order', $order)
            ->with('tests', $tests)
            ->with('sum', $sum)
            ->with('payment', $payment);
    }

}
