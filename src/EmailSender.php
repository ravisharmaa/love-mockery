<?php

declare(strict_types=1);

namespace App;

use App\Contracts\EmailServiceProvider;
use App\Exceptions\EmailCouldNotBeSent;

class EmailSender implements EmailServiceProvider
{
    public function send($personTobeEmailed)
    {
         try {
             mail($personTobeEmailed, 'Hello from mockery', 'This is testing of mocks');
         } catch (EmailCouldNotBeSent $emailCouldNotBeSent) {

         }

    }
}
