<?php

declare(strict_types=1);

namespace App\Contracts;

interface EmailServiceProvider
{
    public function send($personToBeEmailed);
}
