<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */


namespace Omnipay\MoMo\Message\AllInOne;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class IncomingResponse extends AbstractSignatureResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'partnerCode',
            'accessKey',
            'requestId',
            'amount',
            'orderId',
            'orderInfo',
            'orderType',
            'transId',
            'message',
            'localMessage',
            'responseTime',
            'errorCode',
            'payType',
            'extraData',
        ];
    }
}