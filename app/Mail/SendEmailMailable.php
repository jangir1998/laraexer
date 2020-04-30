<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailMailable extends Mailable
{
    use Queueable, SerializesModels;
    //public $name = 'hemant';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->name=$username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('welcome');
        return $this->from('hemant@example.com')->view('welcome');
        //return $this->from('hemant@example.com')->view('sendmail')->with(['inputs' => $this->name]);
    }
}

