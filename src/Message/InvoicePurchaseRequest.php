<?php

namespace Omnipay\Xendit\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class InvoicePurchaseRequest extends AbstractRequest
{
    const MIN_AMOUNT = 11000;

    public function sendData($data)
    {
        $customHeaders = [
            'Authorization: Basic ' . base64_encode($this->getSecretApiKey() . ':'),
            'Content-Type: application/json',
        ];

        if ($this->getForUserId()) {
            $customHeaders[] = 'for-user-id: '.$this->getForUserId();
        }
        if ($this->getWithFeeRule()) {
            $customHeaders[] = 'with-fee-rule: '.$this->getWithFeeRule();
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getEndPoint(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => 'gzip',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $customHeaders,
        ));
        
        $response = curl_exec($curl);

        return new InvoicePurchaseResponse($this, $response);
    }

    public function getData()
    {
        $this->guardAmount(intval($this->getParameter('amount')));
        $this->purchaseGuardParameters();

        return $this->getParameters();
    }

    private function guardAmount($amount)
    {
        if ($amount < self::MIN_AMOUNT) {
            throw new InvalidRequestException('The minimum amount to create an invoice is '.self::MIN_AMOUNT);
        }
    }
}