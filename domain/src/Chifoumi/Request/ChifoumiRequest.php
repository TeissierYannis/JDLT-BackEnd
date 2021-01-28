<?php

namespace Domain\Chifoumi\Request;

/**
 * Class ChifoumiRequest
 * @package Domain\Chifoumi\Request
 */
class ChifoumiRequest
{
    /**
     * @var string
     */
    private string $playerSign;

    /**
     * ChifoumiRequest constructor.
     * @param string $playerSign
     */
    public function __construct(string $playerSign)
    {
        $this->playerSign = $playerSign;
    }

    /**
     * @param string $playerSign
     * @return ChifoumiRequest
     */
    public static function create(string $playerSign): self
    {
        return new self($playerSign);
    }

    /**
     * @return string
     */
    public function getPlayerSign(): string
    {
        return $this->playerSign;
    }
}
