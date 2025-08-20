<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNewOrderStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Your Order Status Has Changed')
            ->view('emails.admin-new-order-status');
    }
}
