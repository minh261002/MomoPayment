<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */


namespace Omnipay\MoMo\Message\AppInApp;

use Omnipay\MoMo\Message\AbstractSignatureResponse;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class PurchaseResponse extends AbstractSignatureResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'status',
            'message',
            'amount',
            'transid',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getCode(): ?string
    {
        return $this->data['status'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['transid'] ?? null;
    }
}