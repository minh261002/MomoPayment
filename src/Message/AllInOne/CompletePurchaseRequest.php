<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message\AllInOne;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * @link https://developers.momo.vn/#/docs/aio/?id=x%e1%bb%ad-l%c3%bd-k%e1%ba%bft-qu%e1%ba%a3-thanh-to%c3%a1n
 *
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class CompletePurchaseRequest extends AbstractIncomingRequest
{
    /**
     * {@inheritdoc}
     */
    protected function getIncomingParametersBag(): ParameterBag
    {
        return $this->httpRequest->query;
    }
}