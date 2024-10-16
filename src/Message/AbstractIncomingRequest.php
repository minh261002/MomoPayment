<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
abstract class AbstractIncomingRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData(): array
    {
        call_user_func_array(
            [$this, 'validate'],
            array_keys($parameters = $this->getIncomingParameters())
        );

        return $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);

        foreach ($this->getIncomingParameters() as $parameter => $value) {
            $this->setParameter($parameter, $value);
        }

        return $this;
    }

    /**
     * Trả về danh sách parameters từ MoMo gửi sang.
     *
     * @return array
     */
    abstract protected function getIncomingParameters(): array;
}