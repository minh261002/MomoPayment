<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message\AllInOne;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class PurchaseResponse extends AbstractSignatureResponse implements RedirectResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSuccessful(): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isRedirect(): bool
    {
        return isset($this->data['payUrl']);
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUrl(): string
    {
        return $this->data['payUrl'];
    }

    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'requestId',
            'orderId',
            'message',
            'localMessage',
            'payUrl',
            'errorCode',
            'requestType',
        ];
    }
}