<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class PayConfirmResponse extends AbstractSignatureResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'amount' => 'data.amount',
            'momoTransId' => 'data.momoTransId',
            'partnerCode' => 'data.partnerCode',
            'partnerRefId' => 'data.partnerRefId',
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
        return $this->data['data']['momoTransId'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionId(): ?string
    {
        return $this->data['data']['partnerRefId'] ?? null;
    }
}