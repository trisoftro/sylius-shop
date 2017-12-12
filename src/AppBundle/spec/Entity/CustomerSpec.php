<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Customer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CustomerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Customer::class);
    }

    function it_is_a_sylius_customer()
    {
        $this->shouldHaveType(\Sylius\Component\Core\Model\Customer::class);
    }


    function it_has_tax_number()
    {
        $this->setTaxNumber('012345');
        $this->getTaxNumber()->shouldReturn('012345');
    }
}
