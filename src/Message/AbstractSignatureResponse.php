<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */
namespace Omnipay\MoMo\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
abstract class AbstractSignatureResponse extends AbstractResponse
{
    use Concerns\ResponseSignatureValidation;

    /**
     * Khởi tạo đối tượng Response.
     *
     * @param  \Omnipay\Common\Message\RequestInterface  $request
     * @param $data
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        if ('0' === $this->getCode()) {
            $this->validateSignature();
        }
    }
}