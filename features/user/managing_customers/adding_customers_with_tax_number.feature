@managing_customers
Feature: Adding a customer with tax number
    In order to know how my customers should be taxed
    As an Administrator
    I want to add a customer with tax number to the store

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Adding a customer with a tax number
        Given I want to create a new customer
        When I specify their email as "info@trisoft.ro"
        And I specify their tax number as "123456"
        And I add them
        Then I should be notified that it has been successfully created
        And the customer "info@trisoft.ro" should appear in the store
