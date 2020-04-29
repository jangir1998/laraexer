<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TestEvent;
class EventTestController extends Controller
{
    function index(){
        event( new TestEvent("message send successfully"));
    }
}
