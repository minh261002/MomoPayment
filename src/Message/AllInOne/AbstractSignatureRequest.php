<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */


namespace Omnipay\MoMo\Message\AllInOne;

use Omnipay\MoMo\Message\AbstractSignatureRequest as BaseAbstractSignatureRequest;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
abstract class AbstractSignatureRequest extends BaseAbstractSignatureRequest
{
    /**
     * Trả về lớp đối tượng phản hồi tương ứng của Request.
     *
     * @var string
     */
    protected $responseClass;

    /**
     * Trả về id đơn hàng.
     *
     * @return null|string
     */
    public function getOrderId(): ?string
    {
        return $this->getParameter('orderId');
    }

    /**
     * Thiết lập id đơn hàng.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setOrderId(?string $id)
    {
        return $this->setParameter('orderId', $id);
    }

    /**
     * Trả về request id.
     *
     * @return null|string
     */
    public function getRequestId(): ?string
    {
        return $this->getParameter('requestId');
    }

    /**
     * Thiết lập request id của đơn hàng.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setRequestId(?string $id)
    {
        return $this->setParameter('requestId', $id);
    }

    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function sendData($data)
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint() . '/gw_payment/transactionProcessor', [
            'Content-Type' => 'application/json; charset=UTF-8',
        ], json_encode($data));
        $responseClass = $this->responseClass;
        $responseData = $response->getBody()->getContents();

        return $this->response = new $responseClass($this, json_decode($responseData, true) ?? []);
    }
}