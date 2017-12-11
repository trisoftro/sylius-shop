<?php

declare(strict_types=1);

namespace AppBundle\OrderProcessor;

use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

final class OrderAdjustmentsClearer implements OrderProcessorInterface
{
    /**
     * @var array
     */
    private static $adjustmentsToRemove = [
        AdjustmentInterface::ORDER_ITEM_PROMOTION_ADJUSTMENT,
        AdjustmentInterface::ORDER_PROMOTION_ADJUSTMENT,
        AdjustmentInterface::ORDER_SHIPPING_PROMOTION_ADJUSTMENT,
        AdjustmentInterface::ORDER_UNIT_PROMOTION_ADJUSTMENT,
        AdjustmentInterface::TAX_ADJUSTMENT,
        'heavy_order',
    ];

    /**
     * {@inheritdoc}
     */
    public function process(OrderInterface $order): void
    {
        foreach (self::$adjustmentsToRemove as $type) {
            $order->removeAdjustmentsRecursively($type);
        }
    }
}
