<?php

declare(strict_types=1);

namespace App;

use App\Contracts\EmailServiceProvider;

class PrepareNotifications
{
    public EmailServiceProvider $emailSender;

    public string $personToBeEmailed;

    public LogWriter $logWriter;

    /**
     * PrepareNotifications constructor.
     * @param EmailServiceProvider $emailSender
     *
     * @param string $personToBeEmailed
     *
     * @param LogWriter $logWriter
     */
    public function __construct(EmailServiceProvider $emailSender, string $personToBeEmailed, LogWriter $logWriter)
    {
        $this->emailSender = $emailSender;
        $this->personToBeEmailed = $personToBeEmailed;
        $this->logWriter = $logWriter;
    }

    public function notify()
    {
        return $this->emailSender->send($this->personToBeEmailed);
    }
}
