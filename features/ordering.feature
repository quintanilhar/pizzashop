@order
Feature: Ordering a Pizza
  In order to satisfy my hunger
  As a Customer
  I want to order a pizza

  Background:
    Given the shop has a "Margherita" pizza in the menu

  Scenario: Ordering a pizza
    When I order a "Margherita" pizza
    Then I should have a "Margherita" pizza in my order
    And the total should be "$10.00"
    And a request should be set to the Pizzaiolo to cook the pizza
