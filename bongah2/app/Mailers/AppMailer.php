<?php
/**
 * Created by PhpStorm.
 * User: NP
 * Date: 5/11/2018
 * Time: 10:04 AM
 */

namespace App\Mailers;




use App\User;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer
{
   protected $from='laravelf518@gmail.com';
   protected $to;
   protected $view;
   protected $data=[];
   protected $mailer;

    /**
     * AppMailer constructor.
     * @param $mailer
     */
    public function __construct( Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmailConfirmationTo(User $user)
    {
       $this->to=$user->email;
        $this->view='emails.confirm';
        $this->data=compact('user');
    $this->deliver();
    }

    public function deliver()
    {
      $this->mailer->send($this->view,$this->data,function($message){
          $message->from($this->from,'admin');
          $message->to($this->to)->subject('confirm message');

      });
    }
}