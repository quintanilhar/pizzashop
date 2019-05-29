@cooking
Feature: Cooking Pizza
  In order to feed my customers
  As a Pizzaiolo
  I want to be able to cook a pizza

  Scenario: Cooking a pizza following an existing recipe
    Given the shop has a "Pepperoni" pizza with the toppings "mozzarella,pepperoni" in the menu
    When I cook it
    Then it should be cooked following its recipe
