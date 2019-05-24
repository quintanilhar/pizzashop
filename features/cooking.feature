@cooking
Feature: Cooking Pizza
  In order to feed my customers
  As a Pizzaiolo
  I want to be able to cook a pizza

  Scenario: Cooking a pizza following an existing recipe
    Given the shop has a "Pepperoni" pizza with the toppings "muzzarela, pepperoni" in the menu
    When I prepare a "Pepperoni" pizza
    Then it should be prepared following the "Pepperoni" recipe
