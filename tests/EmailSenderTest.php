<?php

use App\Contracts\EmailServiceProvider;
use App\Exceptions\EmailCouldNotBeSent;
use App\LogWriter;
use App\PrepareNotifications;
use PHPUnit\Framework\TestCase;

class EmailSenderTest extends TestCase
{
    /**
     * @test
     */
    public function test_that_it_sends_email()
    {
        $fakeEmailSender = Mockery::mock(EmailServiceProvider::class);

        $fakeLogWriter = $this->createStub(LogWriter::class);

        $personTobeEmailed = 'ravi.sharma@javra.com';

        $fakeEmailSender->shouldReceive('send')
            ->with($personTobeEmailed)
            ->andReturnTrue();

        $prepareNotifications = new PrepareNotifications($fakeEmailSender,$personTobeEmailed, $fakeLogWriter);

        $this->assertTrue($prepareNotifications->notify());
    }
    
    /**
     * @test
     */

    public function it_writes_to_log_when_email_could_not_be_sent()
    {

        $personTobeEmailed = 'ravi.sharma@javra.com';

        $stubEmailSender = $this->createStub(\App\EmailSender::class);

        $stubEmailSender->method('send')->willThrowException(new EmailCouldNotBeSent());

        $fakeLogWriter = Mockery::mock(\App\LogWriter::class);

        $fakeLogWriter->shouldReceive('write')->andReturnTrue();

        $prepareNotification = new PrepareNotifications($stubEmailSender, $personTobeEmailed, $fakeLogWriter);

        $prepareNotification->notify();

        $this->assertTrue($fakeLogWriter->write());
    }
}
