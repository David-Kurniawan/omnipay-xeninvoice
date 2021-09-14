<?php

namespace Omnipay\Xendit\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class ChannelResponse extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        if (!is_array($data)) {
            $this->data = json_decode(trim($data), true);
        }
    }

    public function isSuccessful()
    {
        return isset($this->data[0]['channel_code']);
    }

    public function getData()
    {
        return $this->data;
    }
}