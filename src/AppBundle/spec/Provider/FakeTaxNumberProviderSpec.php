<?php

declare(strict_types=1);

namespace spec\AppBundle\Provider;

use AppBundle\Entity\Customer;
use AppBundle\Provider\TaxNumberProviderInterface;
use PhpSpec\ObjectBehavior;
use AppBundle\Provider\FakeTaxNumberProvider;

final class FakeTaxNumberProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FakeTaxNumberProvider::class);
    }

    function it_implements_tax_number_provider_interface()
    {
        $this->shouldImplement(TaxNumberProviderInterface::class);
    }

    function it_provides_fake_tax_number(Customer $customer)
    {
        $this->provide($customer)->shouldBeString();
        $this->provide($customer)->shouldHaveLength(8);
    }

    public function getMatchers(): array
    {
        return [
            'haveLength' => function(string $value, int $expectedValue): bool {
                return strlen($value) === $expectedValue;
            },
        ];
    }
}
