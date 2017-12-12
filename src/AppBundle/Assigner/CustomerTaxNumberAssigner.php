<?php

declare(strict_types=1);

namespace AppBundle\Assigner;

use AppBundle\Entity\Customer;
use AppBundle\Provider\TaxNumberProviderInterface;
use Sylius\Component\Core\Repository\CustomerRepositoryInterface;

class CustomerTaxNumberAssigner implements CustomerTaxNumberAssignerInterface
{
    /**
     * @var TaxNumberProviderInterface
     */
    private $taxNumberProvider;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    public function __construct(
        TaxNumberProviderInterface $taxNumberProvider,
        CustomerRepositoryInterface $customerRepository
    )
    {
        $this->taxNumberProvider = $taxNumberProvider;
        $this->customerRepository = $customerRepository;
    }

    public function assignToAll(): void
    {
        /** @var Customer[] $customers */
        $customers = $this->customerRepository->findAll();

        foreach ($customers as $customer) {
            $customer->setTaxNumber($this->taxNumberProvider->provide($customer));
        }
    }
}
