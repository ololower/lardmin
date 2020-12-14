<?php

namespace Ctrlv\Lardmin\ContentBuilder\Presets\Traits;

/**
 * Поля доступных действий на странице
 * Trait HasBreadcrumbs
 * @package Ctrlv\Lardmin\ContentBuilder\Presets\Traits
 */
trait HasActions {
    protected $actions;

    public function setActions(array $actions) {
        $this->actions = $actions;
    }
}
