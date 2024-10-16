<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message\AllInOne;

use Symfony\Component\HttpFoundation\ParameterBag;
use Omnipay\MoMo\Message\AbstractIncomingRequest as BaseAbstractIncomingRequest;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
abstract class AbstractIncomingRequest extends BaseAbstractIncomingRequest
{
    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function sendData($data): IncomingResponse
    {
        return $this->response = new IncomingResponse($this, $data);
    }

    /**
     * {@inheritdoc}
     */
    protected function getIncomingParameters(): array
    {
        $data = [];
        $params = [
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
            'extraData',
            'signature',
            'payType',
        ];
        $bag = $this->getIncomingParametersBag();

        foreach ($params as $param) {
            $data[$param] = $bag->get($param);
        }

        return $data;
    }

    /**
     * Trả về request parameter bag.
     *
     * @return \Symfony\Component\HttpFoundation\ParameterBag
     */
    abstract protected function getIncomingParametersBag(): ParameterBag;
}