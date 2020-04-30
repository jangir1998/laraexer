<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\SendEmailMailable;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function testmail()
    {
    
        Mail::to('test@gmail.com')->send(new SendEmailMailable('heamnt jangir'));
        //Mail::to('test@gmail.com','tester')->send(new SendEmailMailable($inputs));

        // $emailJob = (new SendWelcomeMail('Pankaj Sood'))->delay(Carbon::now()->addSeconds(3));
        // dispatch($emailJob);
        return "email is send successfully";
    }
    public function processQueue()
    {
        $emailJob = (new SendEmailMailable('Hemant jangir'))->delay(Carbon::now()->addSeconds(3));
        dispatch($emailJob);
        echo 'Mail Sent';
    }
}
