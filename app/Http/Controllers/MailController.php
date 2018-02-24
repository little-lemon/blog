<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendReminderEmail;

class MailController extends Controller
{
    public function send()
    {
       $name = '2018';
        $flag = Mail::send('emails.test',['name'=>$name],function($message){
            $to = '766019882@qq.com';
            $message ->to($to)->subject('测试邮件');
        });
        dd($flag);
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }

    public function store(Request $request)
    {
        $user = $request->user();
        SendReminderEmail::dispatch($user);
    }
}
