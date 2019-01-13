<?php declare(strict_types=1);

namespace ApiClients\Rx\Tests\Operator;

use ApiClients\Rx\Operator\JsonDecodeOperator;
use ApiClients\Tools\TestUtilities\TestCase;
use Exception;
use Prophecy\Argument;
use function React\Promise\reject;
use function React\Promise\resolve;
use Rx\ObserverInterface;
use Rx\React\Promise;

/**
 * @internal
 */
final class JsonDecodeOperatorTest extends TestCase
{
    public function testDecode(): void
    {
        $observer = $this->prophesize(ObserverInterface::class);
        $observer->onNext(Argument::exact([
            'foo' => 'bar',
        ]))->shouldBeCalled();
        $observer->onCompleted()->shouldBeCalled();

        $operator = new JsonDecodeOperator();

        $observable = Promise::toObservable(resolve('{"foo":"bar"}'));

        $operator($observable, $observer->reveal());
    }

    public function testError(): void
    {
        $exception = new Exception('foo.bar');
        $observer = $this->prophesize(ObserverInterface::class);
        $observer->onError($exception)->shouldBeCalled();

        $operator = new JsonDecodeOperator();

        $observable = Promise::toObservable(reject($exception));

        $operator($observable, $observer->reveal());
    }
}
