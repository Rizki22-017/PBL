<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendWhatsAppMessage($message)
    {
        $twilioWhatsappTo = 'whatsapp:' . env('TWILIO_WHATSAPP_TO');
        $twilioWhatsappFrom = 'whatsapp:' . env('TWILIO_WHATSAPP_FROM');
        

        $this->client->messages->create(
            $twilioWhatsappTo,
            [
                'from' => $twilioWhatsappFrom,
                'body' => $message,
            ]
        );
    }
}
