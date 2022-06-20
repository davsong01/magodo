<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        if($this->data['type'] == 'user-contact'){
            return $this->markdown('mails.notificationEmails')
                ->subject('Thank you for your mesage');
        }

        if($this->data['type'] == 'admin-contact'){
            return $this->markdown('mails.notificationEmails')
                ->subject('New contact form');
        }
        if($this->data['type'] == 'new_product_user'){
            return $this->markdown('mails.notificationEmails')
                ->subject('Payment received');
        }
        if($this->data['type'] == 'new_product_admin'){
            return $this->markdown('mails.notificationEmails')
                ->subject('Payment received from '.$this->data['name']);
        }
    }

}      
