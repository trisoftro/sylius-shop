<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Customer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\Customer as BaseCustomer;

final class CustomerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Customer::class);
    }

    function it_is_a_sylius_customer()
    {
        $this->shouldImplement(BaseCustomer::class);
        $this->shouldBeAnInstanceOf(BaseCustomer::class);
        $this->shouldHaveType(BaseCustomer::class);
    }

    function it_has_tax_number()
    {
        $this->setTaxNumber('666');
        $this->getTaxNumber()->shouldReturn('666');
    }
}
