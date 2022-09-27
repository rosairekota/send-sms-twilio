<?php
namespace  App\Service;

use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
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
        $this->accountSid = 'AC987532106b6ad96581e95f63eef9f69c';
        $this->authToken ='f4cb81376adc9256ac0df509e8d6f194';
        $this->client = new Client($this->accountSid, $this->authToken);

    }

    /**
     * @throws TwilioException
     * @throws ConfigurationException
     */
    public  function sendSms(?string $twilioNumber): bool{
        try {
            $this->client->messages->create(
                '+243855063200',
                array(
                    'from' => $twilioNumber,
                    'body' => 'I sent this message in under 10 minutes!'
                )
            );
            return  true;
        }catch (ConfigurationException $e)
        {
            throw  new ConfigurationException("erreur");
        }
        return false;
  }
}