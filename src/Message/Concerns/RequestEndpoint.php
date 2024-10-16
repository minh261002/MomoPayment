<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message\Concerns;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
trait RequestEndpoint
{
    /**
     * Trả về url kết nối MoMo.
     *
     * @return string
     */
    protected function getEndpoint(): string
    {
        return $this->getTestMode() ? 'https://test-payment.momo.vn' : 'https://payment.momo.vn';
    }
}