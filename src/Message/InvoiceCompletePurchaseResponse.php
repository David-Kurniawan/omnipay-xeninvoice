<?php

namespace Omnipay\Xendit\Message;


use Omnipay\Common\Message\AbstractResponse;

class InvoiceCompletePurchaseResponse extends AbstractResponse
{
    public function isPending()
    {
        return strtolower('pending') === strtolower($this->emptyIfNotFound($this->data, 'status'));
    }

    public function isSuccessful()
    {
        return strtolower('paid') === strtolower($this->emptyIfNotFound($this->data, 'status'));
    }

    public function isExpired()
    {
        return strtolower('expired') === strtolower($this->emptyIfNotFound($this->data, 'status'));
    }

    public function getTransactionId()
    {
        return $this->emptyIfNotFound($this->data, 'external_id');
    }

    public function getTransactionReference()
    {
        return $this->emptyIfNotFound($this->data, 'id');
    }

    protected function emptyIfNotFound($haystack, $needle)
    {
        if (!isset($haystack[$needle])) {
            return '';
        }
        return $haystack[$needle];
    }
}