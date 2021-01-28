<?php

namespace Domain\Chifoumi\UseCase;

use Domain\Chifoumi\Request\ChifoumiRequest;
use Domain\Chifoumi\Response\ChifoumiResponse;
use Domain\Chifoumi\Presenter\ChifoumiPresenterInterface;

/**
 * Class Chifoumi
 * @package Domain\Chifoumi\UseCase
 */
class Chifoumi
{
    /**
     * @var string[]
     */
    private const POSSIBLES_SIGNS = ['rock', 'paper', 'scissor'];

    /**
     * @var string[]
     */
    private const WINNER_POSSIBILITIES = [
        'rock' => 'scissor',
        'paper' => 'scissor',
        'scissor' => 'paper'
    ];

    /**
     * @var string
     */
    private string $robotSign;

    /**
     * @var int|null
     */
    private int|null $winner;

    /**
     * @var string
     */
    private string $playerSign;

    /**
     * @param ChifoumiRequest $request
     * @param ChifoumiPresenterInterface $presenter
     */
    public function execute(ChifoumiRequest $request, ChifoumiPresenterInterface $presenter)
    {
        $this->playerSign = $request->getPlayerSign();

        $this->generateSign()
            ->computeWinner()
        ;

        $presenter->present(ChifoumiResponse::create($this->robotSign, $this->playerSign, $this->winner));
    }

    /**
     * @return $this
     */
    private function generateSign(): self
    {
        $this->robotSign = self::POSSIBLES_SIGNS[rand(0, 2)];

        return $this;
    }

    private function computeWinner(): self
    {
        if($this->playerSign === $this->robotSign){
            $this->winner = null;
        }else{
            foreach(self::WINNER_POSSIBILITIES as $winner => $looser)
            {
                if($winner === $this->playerSign && $looser === $this->robotSign)
                {
                    $this->winner = 1;
                }
            }
            if(!isset($this->winner))
            {
                $this->winner = 0;
            }
        }

        return $this;
    }
}
