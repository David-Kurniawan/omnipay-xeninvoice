<?php

namespace Omnipay\Xendit\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    private $endPoint = 'https://api.xendit.co/v2/invoices';

    public function getEndPoint()
    {
        return $this->endPoint;
    }

    public function getSecretApiKey()
    {
        return $this->getParameter('secretApiKey');
    }

    public function setSecretApiKey($serverApiKey)
    {
        return $this->setParameter('secretApiKey', $serverApiKey);
    }

    public function getForUserId()
    {
        return $this->getParameter('forUserId');
    }

    public function setForUserId($forUserId)
    {
        return $this->setParameter('forUserId', $forUserId);
    }

    public function getWithFeeRule()
    {
        return $this->getParameter('withFeeRule');
    }

    public function setWithFeeRule($withFeeRule)
    {
        return $this->setParameter('withFeeRule', $withFeeRule);
    }

    public function getExternalId()
    {
        return $this->getParameter('external_id');
    }

    public function setExternalId($external_id)
    {
        return $this->setParameter('external_id', $external_id);
    }

    public function getPayerEmail()
    {
        return $this->getParameter('payer_email');
    }

    public function setPayerEmail($payer_email)
    {
        return $this->setParameter('payer_email', $payer_email);
    }

    public function getPaymentMethods()
    {
        return $this->getParameter('payment_methods');
    }

    public function setPaymentMethods($payment_methods)
    {
        return $this->setParameter('payment_methods', $payment_methods);
    }

    public function getFixedVa()
    {
        return $this->getParameter('fixed_va');
    }

    public function setFixedVa($fixed_va)
    {
        return $this->setParameter('fixed_va', $fixed_va);
    }

    public function getInvoiceDuration ()
    {
        return $this->getParameter('invoice_duration');
    }

    public function setInvoiceDuration($duration)
    {
        return $this->setParameter('invoice_duration', $duration);
    }

    public function getSuccessRedirectUrl ()
    {
        return $this->getParameter('success_redirect_url');
    }

    public function setSuccessRedirectUrl($url)
    {
        return $this->setParameter('success_redirect_url', $url);
    }

    protected function purchaseGuardParameters()
    {
        $this->validate(
            'external_id',
            'payer_email',
            'description',
            'amount',
        );
    }
}
