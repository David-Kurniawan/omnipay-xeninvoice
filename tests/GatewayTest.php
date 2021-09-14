<?php
/**
 * Created by PhpStorm.
 * User: xuding
 * Date: 7/8/18
 * Time: 8:55 AM
 */

namespace Omnipay\Tests\TestCase;

use Omnipay\Tests\TestCase;
use Omnipay\Xendit\Gateway;

class GatewayTest extends TestCase
{

    /** @var Gateway */
    protected $gateway;

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $this->gateway->setSecretApiKey('xnd_development_tAdNnWVxTrbu1NRlFkAYVvLO66LtnWIdxeaVmzB59y4DHjy3z8iDlYNNCl14Df');
    }

    /**
     * @group channel
     */
    public function testChannel()
    {
        $this->gateway->setForUserId('601aeedb25591a3d074d0c10'); // If u want to use xenPlatform
        $response = $this->gateway->channel()->send();
        error_log(print_r($response->getData(), TRUE), 3, "./error.log");

        $this->assertTrue($response->isSuccessful());
    }

    /**
     * @group createinvoice
     */
    public function testCreateInvoice()
    {
        $orderId = 'eyVha'.time();

        $this->gateway->setForUserId('601b0ead60654f15c80f667e'); // If u want to use xenPlatform
        $this->gateway->setWithFeeRule('xpfeeru_db3a6542-b65f-4d9a-b23c-c1a630c396e3'); // If u want to use xenPlatform
        // Params
        $this->gateway->setParameter('external_id', $orderId);
        $this->gateway->setParameter('payer_email', 'idozsambas@gmail.com');
        $this->gateway->setParameter('description', 'Invoice #'.$orderId);
        $this->gateway->setParameter('amount', 69000);
        $this->gateway->setParameter('fixed_va', true);
        $this->gateway->setParameter('payment_methods', ["MANDIRI"]);
        $response = $this->gateway->purchase()->send();
        error_log(print_r($response->getData(), TRUE), 3, "./error.log");

        $this->assertTrue($response->isSuccessful());
    }
}
