<?php

namespace Omnipay\Xendit\Message;

class ChannelRequest extends AbstractRequest
{
    public function sendData($data)
    {
        $customHeaders = [
            'Authorization: Basic ' . base64_encode($this->getSecretApiKey() . ':'),
            'Content-Type: application/json',
        ];

        if ($this->getForUserId()) {
            $customHeaders[] = 'for-user-id: '.$this->getForUserId();
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getEndpoint(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => 'gzip',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $customHeaders,
        ));
        $httpResponse = curl_exec($curl);

        return new ChannelResponse($this, $httpResponse);
    }

    public function getData()
    {
        return;
    }

    public function getEndpoint()
    {
        $endpoint = str_replace('/v2/invoices', '', parent::getEndpoint());

        return $endpoint . '/payment_channels';
    }
}