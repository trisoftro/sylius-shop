<?php

declare(strict_types=1);

namespace spec\AppBundle\Assigner;

use AppBundle\Assigner\CustomerTaxNumberAssigner;
use AppBundle\Assigner\CustomerTaxNumberAssignerInterface;
use AppBundle\Entity\Customer;
use AppBundle\Provider\TaxNumberProviderInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Repository\CustomerRepositoryInterface;

final class CustomerTaxNumberAssignerSpec extends ObjectBehavior
{
    function let(
        TaxNumberProviderInterface $taxNumberProvider,
        CustomerRepositoryInterface $customerRepository
    )
    {
        $this->beConstructedWith($taxNumberProvider, $customerRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CustomerTaxNumberAssigner::class);
    }

    function it_implements_tax_number_assigner_interface()
    {
        $this->shouldImplement(CustomerTaxNumberAssignerInterface::class);
    }

    function it_assigns_tax_number_to_each_customer(
        TaxNumberProviderInterface $taxNumberProvider,
        CustomerRepositoryInterface $customerRepository,
        Customer $firstCustomer,
        Customer $secondCustomer
    )
    {
        $customerRepository
            ->findAll()
            ->willReturn([
                $firstCustomer,
                $secondCustomer,
            ])
        ;

        $taxNumberProvider->provide($firstCustomer)->willReturn('1558');
        $taxNumberProvider->provide($secondCustomer)->willReturn('2150');

        $firstCustomer->setTaxNumber('1558')->shouldBeCalled();
        $secondCustomer->setTaxNumber('2150')->shouldBeCalled();

        $firstCustomer->getTaxNumber()->willReturn('1558');
        $secondCustomer->getTaxNumber()->willReturn('2150');

        $this->assignToAll();
    }
}
