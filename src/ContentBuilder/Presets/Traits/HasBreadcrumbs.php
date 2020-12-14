<?php

namespace Ctrlv\Lardmin\ContentBuilder\Presets\Traits;

/**
 * Поле хлебных крошек
 * Trait HasBreadcrumbs
 * @package Ctrlv\Lardmin\ContentBuilder\Presets\Traits
 */
trait HasBreadcrumbs {
    protected $breadcrumbs;

    public function setBreadcrumbs(array $breadcrumbs) {
        $this->breadcrumbs = $breadcrumbs;
    }
}
