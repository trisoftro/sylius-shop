<?php

declare(strict_types=1);

namespace AppBundle\Entity;

class Customer extends \Sylius\Component\Core\Model\Customer
{
    /**
     * @var string
     */
    private $taxNumber;

    public function setTaxNumber(?string $taxNumber): void
    {
        $this->taxNumber = $taxNumber;
    }

    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }
}
