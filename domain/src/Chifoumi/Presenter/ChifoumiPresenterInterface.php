<?php

namespace Domain\Chifoumi\Presenter;

use Domain\Chifoumi\Response\ChifoumiResponse;

/**
 * Interface ChifoumiPresenterInterface
 * @package Domain\Chifoumi\Presenter
 */
interface ChifoumiPresenterInterface
{
    /**
     * @param ChifoumiResponse $response
     */
    public function present(ChifoumiResponse $response): void;
}
