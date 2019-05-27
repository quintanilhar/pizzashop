<?php

namespace Quintanilhar\PizzaShop\Domain;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CookingServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_give_Pizza_when_asked_for_cooking_aPizza()
    {
        $recipeRepository = $this->recipeRepositoryMock(
            new Recipe('pepperoni', ['mozzarella', 'pepperoni'])
        );

        $cookingService = new CookingService($recipeRepository);

        $pizza = $cookingService->cookPizza('pepperoni');

        $this->assertSame(['mozzarella', 'pepperoni'], $pizza->toppings());
    }

    /**
     * @test
     */
    public function it_should_throw_when_asked_to_cook_unknown_pizza()
    {
        $this->expectException(UnknownPizza::class);

        $recipeRepository = $this->recipeRepositoryMock(null);

        $cookingService = new CookingService($recipeRepository);

        $cookingService->cookPizza('unknown-pizza');
    }

    private function recipeRepositoryMock($willReturn): RecipeRepository
    {
        /** @var MockObject|RecipeRepository $recipeRepository */
        $recipeRepository = $this->getMockBuilder(RecipeRepository::class)
            ->getMock();

        $recipeRepository->method('recipeOfPizzaId')
            ->willReturn($willReturn);

        return $recipeRepository;
    }
}
