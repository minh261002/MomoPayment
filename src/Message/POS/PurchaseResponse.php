<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message\POS;

use Omnipay\MoMo\Message\AbstractResponse;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class PurchaseResponse extends AbstractResponse
{
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
    public function getMessage(): ?string
    {
        return $this->data['message']['description'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['message']['transid'] ?? null;
    }
}