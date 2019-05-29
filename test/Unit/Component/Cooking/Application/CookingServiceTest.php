<?php

namespace Quintanilhar\PizzaShop\Test\Unit\Component\Cooking\Application;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Quintanilhar\PizzaShop\Component\Cooking\Application\CookingService;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\PizzaRepository;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\UnknownPizza;
use Quintanilhar\PizzaShop\Test\Unit\Component\Cooking\Domain\PizzaForTestProvider;

class CookingServiceTest extends TestCase
{
    use PizzaForTestProvider;

    /**
     * @test
     */
    public function it_should_give_Pizza_when_asked_for_cooking_aPizza()
    {
        $testPizza = $this->pizzaForTest();

        $pizzaRepository = $this->pizzaRepositoryMock($testPizza);

        $cookingService = new CookingService($pizzaRepository);

        $pizza = $cookingService->cookPizza((string) $testPizza->pizzaId());

        $this->assertSame($testPizza->toppings(), $pizza->toppings());
    }

    /**
     * @test
     */
    public function it_should_throw_when_asked_to_cook_unknown_pizza()
    {
        $this->expectException(UnknownPizza::class);

        $recipeRepository = $this->pizzaRepositoryMock(null);

        $cookingService = new CookingService($recipeRepository);

        $cookingService->cookPizza('unknown-pizza');
    }

    private function pizzaRepositoryMock($willReturn): PizzaRepository
    {
        /** @var MockObject|PizzaRepository $recipeRepository */
        $recipeRepository = $this->getMockBuilder(PizzaRepository::class)
            ->getMock();

        $recipeRepository->method('pizzaOfId')
            ->willReturn($willReturn);

        return $recipeRepository;
    }
}
