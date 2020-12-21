<?php

namespace Ctrlv\Lardmin\ContentBuilder\Presets\Traits;

/**
 * Поля доступных действий на странице
 * Trait HasBreadcrumbs
 * @package Ctrlv\Lardmin\ContentBuilder\Presets\Traits
 */
trait HasActions {

    protected $actions = [];

    private function addAction($data) {
        $this->actions[] = $data;
    }

    public function addSubmitAction($text, string $form, string $color = 'blue') {
        $this->addAction([
            'type' => "submit",
            'form' => $form,
            'color' => $color,
            'text' => $text
        ]);
    }
    public function addLinkAction($text, $url, $color = 'blue') {
        $this->addAction([
            'type' => "link",
            'url' => $url,
            'color' => $color,
            'text' => $text
        ]);
    }
}
