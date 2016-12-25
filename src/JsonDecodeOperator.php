<?php declare(strict_types=1);

namespace ApiClients\Rx\Operator;

use Rx\ObservableInterface;
use Rx\Observer\CallbackObserver;
use Rx\ObserverInterface;
use Rx\Operator\OperatorInterface;
use Rx\SchedulerInterface;

final class JsonDecodeOperator implements OperatorInterface
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
            function (string $json) use ($observer) {
                $observer->onNext(json_decode($json, true));
            },
            [$observer, 'onError'],
            [$observer, 'onCompleted']
        ));
    }
}
