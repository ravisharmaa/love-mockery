<?php

require_once 'vendor/autoload.php';

(new \App\PrepareNotifications(
    (new \App\EmailSender()),
    'ravi,sharma@javra.com',
    (new \App\LogWriter())
))->notify();
