@managing_customers
Feature: Browsing customers with tax numbers
    In order to easily identify customers with a tax number
    As an Administrator
    I want to see tax numbers on customers list

    Background:
        Given the store has customer "info2@trisoft.ro"
        And the store has customer "info@trisoft.ro"
        And the customer "info@trisoft.ro" has the tax number "123456"
        And I am logged in as an administrator

    Scenario: Browsing customers with tax numbers
        When I want to see all customers in store
        Then I should see 2 customers in the list
        And I should see the customer "info@trisoft.ro" with tax number "123456"