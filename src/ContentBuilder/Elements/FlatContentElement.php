<?php

namespace Ctrlv\Lardmin\ContentBuilder\Elements;

use Illuminate\Contracts\View\View;

/**
 * Плоский элемент - элемент, у которого не может быть детей :(
 * Class FlatContentElement
 * @package Ctrlv\Lardmin\ContentBuilder\Elements
 */
abstract class FlatContentElement implements iElement {

    protected $view_params;

    public function setViewParams(array $view_params) {
        $this->view_params = $view_params;
    }

    public function push(iElement $element) {
        throw new \Exception("Elements, extended from FlatContentElement can't push any child");
    }

    public function getElement(): View {
        return view($this->view_name)->with($this->view_params);
    }
}
