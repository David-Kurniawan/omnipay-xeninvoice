<?php
/**
 * Created by PhpStorm.
 * User: xuding
 * Date: 6/8/18
 * Time: 11:05 AM
 */

namespace Omnipay\Xendit;


use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Xendit';
    }

    public function getDefaultParameters()
    {
        return [
            'secretApiKey' => ''
        ];
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

    public function channel(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Xendit\Message\ChannelRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Xendit\Message\InvoicePurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Xendit\Message\InvoiceCompletePurchaseRequest', $parameters);
    }

}