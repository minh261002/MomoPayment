<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message\AllInOne;

/**
 * @link https://developers.momo.vn/#/docs/aio/?id=ki%e1%bb%83m-tra-tr%e1%ba%a1ng-th%c3%a1i-ho%c3%a0n-ti%e1%bb%81n
 *
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class QueryRefundRequest extends AbstractSignatureRequest
{
    /**
     * {@inheritdoc}
     */
    protected $responseClass = QueryRefundResponse::class;

    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);
        $this->setParameter('requestType', 'refundStatus');

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'partnerCode',
            'accessKey',
            'requestId',
            'orderId',
            'requestType',
        ];
    }
}