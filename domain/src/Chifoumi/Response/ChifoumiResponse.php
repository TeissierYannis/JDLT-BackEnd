<?php

namespace Domain\Chifoumi\Response;

/**
 * Class ChifoumiResponse
 * @package Domain\Chifoumi\Response
 */
class ChifoumiResponse
{
    /**
     * @var string
     */
    private string $robotSign;

    /**
     * @var string
     */
    private string $playerSign;

    /**
     * @var int|null
     */
    private int|null $winner;

    /**
     * @param string $robotSign
     * @param string $playerSign
     * @param int|null $winner
     * @return static
     */
    public static function create(string $robotSign, string $playerSign, int|null $winner): self
    {
        return new self($robotSign, $playerSign, $winner);
    }

    /**
     * ChifoumiResponse constructor.
     * @param string $robotSign
     * @param string $playerSign
     * @param int|null $winner
     */
    public function __construct(string $robotSign, string $playerSign, int|null $winner)
    {
        $this->robotSign = $robotSign;
        $this->playerSign = $playerSign;
        $this->winner = $winner;
    }

    /**
     * @return string
     */
    public function getRobotSign(): string
    {
        return $this->robotSign;
    }

    /**
     * @return string
     */
    public function getPlayerSign(): string
    {
        return $this->playerSign;
    }

    /**
     * @return int|null
     */
    public function getWinner(): int|null
    {
        return $this->winner;
    }
}
