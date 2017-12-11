<?php

declare(strict_types=1);

namespace AppBundle\OrderProcessor;

use Sylius\Component\Order\Factory\AdjustmentFactoryInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

final class HeavyOrderProcessor implements OrderProcessorInterface
{
    /**
     * @var AdjustmentFactoryInterface
     */
    private $adjustmentFactory;

    public function __construct(AdjustmentFactoryInterface $adjustmentFactory)
    {
        $this->adjustmentFactory = $adjustmentFactory;
    }

    public function process(OrderInterface $order): void
    {
        $totalWeight = 0.0;

        foreach ($order->getItems() as $item) {
            $totalWeight += $item->getVariant()->getWeight() * $item->getQuantity();
        }

        if (100 >= $totalWeight) {
            return;
        }

        $adjustment = $this->adjustmentFactory->createWithData(
            'heavy_order',
            'Heavy order fee',
            1000
        );

        $order->addAdjustment($adjustment);
    }
}