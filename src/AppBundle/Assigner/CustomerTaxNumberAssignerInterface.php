<?php

declare(strict_types=1);

namespace AppBundle\Assigner;

interface CustomerTaxNumberAssignerInterface
{
    public function assignToAll(): void;
}
