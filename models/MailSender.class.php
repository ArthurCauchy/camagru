<?php

class MailSender
{
    private $from = NULL;

    public function __construct($from) {
        $this->from = $from;
    }

    public function sendMail($to, $subject, $content) {
        $headers = "From: $this->from\r\n" .
            "Reply-To: $this->from\r\n" .
            "X-Mailer: PHP/" . phpversion();
        mail($to, $subject, $content, $headers);
    }
}
