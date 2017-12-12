<?php

declare(strict_types=1);

namespace Tests\AppBundle\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use PHPUnit\Framework\Assert;
use Sylius\Behat\Page\Admin\Customer\IndexPageInterface;
use Tests\AppBundle\Behat\Page\CustomerCreatePage;

final class ManagingCustomersContext implements Context
{
    /**
     * @var CustomerCreatePage
     */
    private $customerCreatePage;

    /**
     * @var IndexPageInterface
     */
    private $customerIndexPage;

    /**
     * ManagingCustomersContext constructor.
     * @param CustomerCreatePage $customerCreatePage
     */
    public function __construct(CustomerCreatePage $customerCreatePage, IndexPageInterface $customerIndexPage)
    {
        $this->customerCreatePage = $customerCreatePage;
        $this->customerIndexPage = $customerIndexPage;
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
        \Webmozart\Assert\Assert::true($this->customerIndexPage->isSingleResourceOnPage([
            'email' => $customer,
            'taxNumber' => $taxNumber,
        ]));
    }
}
