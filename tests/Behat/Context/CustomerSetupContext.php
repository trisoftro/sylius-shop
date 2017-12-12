<?php

declare(strict_types=1);

namespace Tests\AppBundle\Behat\Context;

use AppBundle\Entity\Customer;
use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;

final class CustomerSetupContext implements Context
{
    /**
     * @var ObjectManager
     */
    private $customerManager;

    public function __construct(ObjectManager $customerManager)
    {
        $this->customerManager = $customerManager;
    }

    /**
     * @Given /^(the customer) has the tax number "([^"]+)"$/
     */
    public function theCustomerHasTheTaxNumber(Customer $customer, string $taxNumber): void
    {
        $customer->setTaxNumber($taxNumber);

        $this->customerManager->flush();
    }
}