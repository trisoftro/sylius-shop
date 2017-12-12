<?php

declare(strict_types=1);

namespace AppBundle\Provider;

use AppBundle\Entity\Customer;
use Faker\Factory;
use Faker\Generator;

class FakeTaxNumberProvider implements TaxNumberProviderInterface
{
    /** @var Generator */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function provide(Customer $customer): string
    {
        return $this->faker->ean8;
    }
}
