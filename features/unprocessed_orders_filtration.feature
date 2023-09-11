@managing_orders
Feature: Extend the orders filtration to be able to filter only orders which are unprocessed
  In order to better find specific orders which were not processed
  As an Administrator
  I want to be able to have checkbox filter which will filter the orders and give me only the list of unprocessed ones

  Background:
    Given I am logged in as an administrator
    And the order's shipment status should be "Ready"
    And the order's payment status should be "Awaiting payment"
    And the order's status should be "New"

  @ui
  Scenario: Checking the unprocessed orders checkbox
    When I want to filter orders
    And I have checked that i want to get only the unprocessed orders
    And I filter the orders by given filters
    Then I should see only unprocessed orders
