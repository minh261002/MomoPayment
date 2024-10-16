<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message\QRCode;

use Omnipay\MoMo\Message\AbstractSignatureResponse;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class NotificationResponse extends AbstractSignatureResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'accessKey',
            'amount',
            'message',
            'momoTransId',
            'partnerCode',
            'partnerRefId',
            'partnerTransId',
            'responseTime',
            'status',
            'storeId',
            'transType',
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
    public function getTransactionId(): ?string
    {
        return $this->data['partnerRefId'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['momoTransId'] ?? null;
    }
}