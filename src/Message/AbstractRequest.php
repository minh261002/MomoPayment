<?php
/**
 * @link https://github.com/minh261002/MomoPayment
 * @copyright (c) Minh Tran
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace Omnipay\MoMo\Message;

use Omnipay\MoMo\Support\Arr;
use Omnipay\MoMo\Concerns\Parameters;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * @author Minh Tran <minh261002>
 * @since 1.0.0
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    use Parameters;

    /**
     * {@inheritdoc}
     */
    public function validate(...$parameters): void
    {
        $listParameters = $this->getParameters();

        foreach ($parameters as $parameter) {
            if (null === Arr::getValue($parameter, $listParameters)) {
                throw new InvalidRequestException(sprintf('The `%s` parameter is required', $parameter));
            }
        }
    }
}