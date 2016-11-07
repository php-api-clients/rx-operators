<?php

namespace Rx\Custom\Operator;

use Rx\ObservableInterface;
use Rx\Observer\CallbackObserver;
use Rx\ObserverInterface;
use Rx\Operator\OperatorInterface;
use Rx\SchedulerInterface;

class JsonDecodeOperator implements OperatorInterface
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
            }
        ));
    }
}
