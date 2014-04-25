<?php

/**
 * Class SwiftMailerService
 */
class SwiftMailerService implements MailerService
{
    /**
     * @var Swift_Mailer
     */
    private $mailer;

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMessage($sender, $subject, $body, $recipient)
    {
        // Construct the message
        $msg = Swift_Message::newInstance($subject);
        $msg
            ->setFrom($sender)
            ->setTo([$recipient])
            ->setBody($body)
        ;

        // Send the message
        $this->doSendMessage($msg);
    }

    // made protected for testing :-(
    protected function doSendMessage(Swift_Message $msg)
    {
        $this->mailer->send($msg);
    }
} 