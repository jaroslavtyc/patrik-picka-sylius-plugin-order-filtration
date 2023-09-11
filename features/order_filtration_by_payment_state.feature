@managing_orders
Feature: Extend the orders filtration to be able to filter by payment state
  In order to better find specific orders in a specific payment state
  As an Administrator
  I want to be able select specific payment state

  Background:
    Given I am logged in as an administrator
    And the order's shipment status should be "selected value from select"

  @ui
  Scenario: Selecting payment status in orders filtration
    When I want to filter orders
    And I have selected <param> payment status in filter
    And I filter the orders by given filters
    Then I should see orders only with selected payment status
