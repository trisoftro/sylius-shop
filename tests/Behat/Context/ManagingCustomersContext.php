<?php

declare(strict_types=1);

namespace Tests\AppBundle\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\AppBundle\Behat\Page\CustomerCreatePage;

final class ManagingCustomersContext implements Context
{
    /**
     * @var CustomerCreatePage
     */
    private $customerCreatePage;

    /**
     * ManagingCustomersContext constructor.
     * @param CustomerCreatePage $customerCreatePage
     */
    public function __construct(CustomerCreatePage $customerCreatePage)
    {
        $this->customerCreatePage = $customerCreatePage;
    }

    /**
     * @When I specify their tax number as :taxNumber
     */
    public function iSpecifyTheirTaxNumberAs(string $taxNUmber): void
    {
        $this->customerCreatePage->specifyByTaxNumber($taxNUmber);
    }

    /**
     * @When I should see the customer :customer with tax number :taxNumber
     */
    public function iShouldSeeTheCustomerWithTaxNumber(string $customer, string $taxNumber): void
    {
        throw new PendingException();
    }
}
