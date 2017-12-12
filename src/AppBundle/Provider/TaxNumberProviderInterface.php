<?php

declare(strict_types=1);

namespace AppBundle\Provider;

use AppBundle\Entity\Customer;

interface TaxNumberProviderInterface
{
    public function provide(Customer $customer): string;
}
