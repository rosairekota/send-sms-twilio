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
        $this->client = new Client($this->accountSid, $this->authToken);

    }

    /**
     * @throws TwilioException
     * @throws ConfigurationException
     */
    public  function sendSms(?string $twilioNumber): bool{
        try {
            $this->client->messages->create(
                '+15558675310',
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