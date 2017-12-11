<?php

declare(strict_types=1);

namespace AppBundle\Sender;

use AppBundle\Entity\Supplier;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class TrustSupplierEmailSender
{
    /**
     * @var SenderInterface
     */
    private $sender;

    public function __construct(SenderInterface $sender)
    {
        $this->sender = $sender;
    }

    public function sendTrustEmail(Supplier $supplier)
    {
        $this->sender->send('sender_trusted', [$supplier->getEmail()], [
            'supplier' => $supplier->getName()
        ]);
    }
}
