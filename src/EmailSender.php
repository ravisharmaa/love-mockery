<?php

declare(strict_types=1);

namespace App;

use App\Contracts\EmailServiceProvider;
use App\Exceptions\EmailCouldNotBeSent;

class EmailSender implements EmailServiceProvider
{
    /**
     * @param $personTobeEmailed
     *
     * @return bool
     *
     * @throws EmailCouldNotBeSent
     */
    public function send($personTobeEmailed)
    {
        $mail = mail($personTobeEmailed, 'Hello from mockery', 'This is testing of mocks');
    }
}
