<?php

namespace Domain\Tests\Chifoumi;

use Domain\Chifoumi\Presenter\ChifoumiPresenterInterface;
use Domain\Chifoumi\Request\ChifoumiRequest;
use Domain\Chifoumi\Response\ChifoumiResponse;
use Domain\Chifoumi\UseCase\Chifoumi;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class ChifoumiTest
 * @package Domain\Tests\Chifoumi
 */
class ChifoumiTest extends TestCase
{
    /**
     * @var ChifoumiPresenterInterface
     */
    private ChifoumiPresenterInterface $presenter;
    /**
     * @var Chifoumi
     */
    private Chifoumi $useCase;

    protected function setUp(): void
    {
        $this->presenter = new class() implements ChifoumiPresenterInterface {
            public ChifoumiResponse $response;

            public function present(ChifoumiResponse $response): void
            {
                $this->response = $response;
            }
        };

        $this->useCase = new Chifoumi();

    }

    /**
     * @dataProvider provideSigns
     * @param string $playerSign
     * @return void
     */
    public function testGoodData(string $playerSign): void
    {
        $request = ChifoumiRequest::create($playerSign);

        $this->useCase->execute($request, $this->presenter);

        self::assertInstanceOf(ChifoumiResponse::class, $this->presenter->response);
        self::assertIsString($this->presenter->response->getRobotSign());
        self::assertContains($this->presenter->response->getRobotSign(), ['rock', 'paper', 'scissor']);

        self::assertIsString($this->presenter->response->getPlayerSign());
        self::assertContains($this->presenter->response->getPlayerSign(), ['rock', 'paper', 'scissor']);

        self::assertContains($this->presenter->response->getWinner(), [0, 1, null]);
    }

    /**
     * @return Generator
     */
    public function provideSigns(): Generator
    {
        yield ['rock'];
        yield ['paper'];
        yield ['scissor'];
    }
}
