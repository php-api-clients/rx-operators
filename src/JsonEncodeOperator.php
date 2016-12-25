<?php declare(strict_types=1);

namespace ApiClients\Rx\Operator;

use Rx\ObservableInterface;
use Rx\Observer\CallbackObserver;
use Rx\ObserverInterface;
use Rx\Operator\OperatorInterface;
use Rx\SchedulerInterface;

final class JsonEncodeOperator implements OperatorInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(
        ObservableInterface $observable,
        ObserverInterface $observer,
        SchedulerInterface $scheduler = null
    ) {
        return $observable->subscribe(new CallbackObserver(
            function (array $json) use ($observer) {
                $observer->onNext(json_encode($json));
            },
            [$observer, 'onError'],
            [$observer, 'onCompleted']
        ));
    }
}
