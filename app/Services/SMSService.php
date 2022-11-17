<?php

namespace App\Services;

use App\Models\{Patient, Prescription};
use Carbon\Carbon;
use DateTime;
use Vonage\Laravel\Facade\Vonage;
// use Vonage\SMS\Client;
use Vonage\Client;
// use Twilio\Rest\Client;
use Vonage\SMS\Message\SMS;

class SMSService
{

    public $from = 'NCDMS';
    public Client $client;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        // $account_sid = getenv("TWILIO_SID");
        // $auth_token = getenv("TWILIO_TOKEN");
        // $twilio_number = getenv("TWILIO_FROM");
        $this->client = new Client(
            new \Vonage\Client\Credentials\Basic(getenv('VONAGE_KEY'), getenv('VONAGE_SECRET')),
        );
    }

    // public function test()
    // {
    //     $VONAGE_KEY = "024f7e40";
    //     $VONAGE_SECRET = "etBX58THwN25PGtu";
    // $client = new Client(
    // new \Vonage\Client\Credentials\Basic($VONAGE_KEY, $VONAGE_SECRET),
    // );
    // $text = new \Vonage\SMS\Message\SMS('2349133603314', 'testing', 'Test message using PHP client library');
    //     // $text->setClientRef('test-message');
    //     $response = $client->sms()->send($text);
    //     return $response;
    // }

    public function test2()
    {
        // $res = $this->client->messages->create("+2349133603314", ["messagingServiceSid" => env('TWILO_MESSAGING_SERVICE_SID'), 'body' => 'Test message using PHP client']);
        // $res->errorMessage;
        // $this->client->messages->create()->
    }
    public function sendSMS($to, $message)
    {

        // $this->test2();
        // $text = new SMS('2349030685318', '2349030685318', 'sasdsmndm');
        // Vonage::sms()->send($text);
        $text = new \Vonage\SMS\Message\SMS($to, $this->from, $message);
        $response = $this->client->sms()->send($text);
        // $response = $this->client->send($text);

        if ($response->current()->getStatus() == 0) {
            dd("The message was sent successfully\n");
            return true;
        } else {
            dd("The message failed with status: " . $message->getStatus() . "\n");
            return false;
        }

        // Vonage::sms()->text($text);
    }


    public function sendMedicationSMS(Prescription $prescription)
    {
        $text = 'Hello, Your medications are ready for pickup. Your prescription includes ';
        $to = $prescription->patient->phone;
        foreach ($prescription->medications as $medication) {
            $text .= "{$medication->drug->name}:{$medication->dosage}, ";
        }
        $stasus = $this->sendSMS($to, $text);
        $prescription->last_sms = Carbon::now();
        $prescription->save();
        return $stasus;
    }
}
