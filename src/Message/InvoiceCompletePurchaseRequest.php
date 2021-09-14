<?php

namespace Omnipay\Xendit\Message;

use Omnipay\Common\Message\ResponseInterface;

class InvoiceCompletePurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        return json_decode($this->httpRequest->getContent(),true);
    }

    public function sendData($data)
    {
        return new InvoiceCompletePurchaseResponse($this, $data);
    }

}