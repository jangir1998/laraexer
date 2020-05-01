<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Jobs\SendEmailJob;
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
        //dispatch(new SendEmailJob());
        
        $Job = (new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
        dispatch($Job);
        return ('email is sended');
    }
} 