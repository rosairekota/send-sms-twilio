<?php
namespace  App\Service;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;
class Notification {
    /**
     * @var string|null
     */
     private $accountSid;

    /**
     * @var string|null
     */
     private $authToken;

    /**
     * @var Client
     */
     private $client;

    /**
     * @throws ConfigurationException
     */
    public  function __construct()
    {
        $this->client = new Client($this->accountSid, $this->authToken);

    }
    public  function sendSms($twilioNumber){
        $this->client->messages->create(
        // Where to send a text message (your cell phone?)
            '+15558675310',
            array(
                'from' => $twilioNumber,
                'body' => 'I sent this message in under 10 minutes!'
            )
        );
  }
}