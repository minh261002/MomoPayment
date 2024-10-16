<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */


namespace Omnipay\MoMo\Message\AllInOne;

/**
 * @link https://developers.momo.vn/#/docs/aio/?id=tr%e1%ba%a1ng-th%c3%a1i-giao-d%e1%bb%8bch
 *
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
class QueryTransactionRequest extends AbstractSignatureRequest
{
    /**
     * {@inheritdoc}
     */
    protected $responseClass = QueryTransactionResponse::class;

    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);
        $this->setParameter('requestType', 'transactionStatus');

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