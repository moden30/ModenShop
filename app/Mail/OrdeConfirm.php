<?php

namespace App\Mail;

use App\Models\Donhang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrdeConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $donhang;
    /**
     * Create a new message instance.
     */
    public function __construct(Donhang $donhang)
    {
        $this->donhang  = $donhang;
    }
    public function build()
    {
        return $this->view('client.donhang.email')
            ->subject('Xác nhận đơn hàng')
            ->with('donhang', $this->donhang);
    }
}
