<?php


namespace App;


class LogWriter
{
    public function write()
    {
        file_put_contents('error.log', 'I cannot send emails');
    }
}