<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;
use App\Mail\OrderMail;

use App\Models\User;
use App\Models\Order;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function (){
    // them order detail de hien thi view Order, folder emails
    $users = User::all();
    foreach($users as $user){
        $order = Order::where('user_id', $user->id)->first();
        if($order){
            Mail::to('khanh.toan.s3corp@gmail.com')->send(new OrderMail($order));
        }
    }
})->everyTwentySeconds();
