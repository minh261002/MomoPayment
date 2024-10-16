<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message\AllInOne;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * @link https://developers.momo.vn/#/docs/aio/?id=ipn-instant-payment-notification
 *
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class NotificationRequest extends AbstractIncomingRequest
{
    /**
     * {@inheritdoc}
     */
    protected function getIncomingParametersBag(): ParameterBag
    {
        return $this->httpRequest->request;
    }
}