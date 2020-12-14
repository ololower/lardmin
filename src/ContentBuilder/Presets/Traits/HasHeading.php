<?php

namespace Ctrlv\Lardmin\ContentBuilder\Presets\Traits;

/**
 * Поле заголовка страницы
 * Trait HasHeading
 * @package Ctrlv\Lardmin\ContentBuilder\Presets\Traits
 */
trait HasHeading {
    protected $heading;

    public function setHeading(string $heading) {
        $this->heading = $heading;
    }
}
