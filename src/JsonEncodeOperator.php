<?php declare(strict_types=1);

namespace ApiClients\Rx\Operator;

use Rx\DisposableInterface;
use Rx\ObservableInterface;
use Rx\ObserverInterface;
use Rx\Operator\OperatorInterface;

final class JsonEncodeOperator implements OperatorInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(
        ObservableInterface $observable,
        ObserverInterface $observer
    ): DisposableInterface {
        return $observable->subscribe(
            function (array $json) use ($observer): void {
                $observer->onNext(\json_encode($json));
            },
            [$observer, 'onError'],
            [$observer, 'onCompleted']
        );
    }
}
