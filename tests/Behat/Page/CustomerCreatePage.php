<?php

declare(strict_types=1);

namespace Tests\AppBundle\Behat\Page;

use Sylius\Behat\Page\Admin\Customer\CreatePage;

final class CustomerCreatePage extends CreatePage
{
    public function specifyByTaxNumber(string $taxNumber): void
    {
        $this->getDocument()->fillField('Tax Number', '123456');
    }
}