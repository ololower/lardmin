<?php

namespace Ctrlv\Lardmin\ContentBuilder\Elements;

use Illuminate\Contracts\View\View;

/**
 * Толстый элемент контента - элемент, которому можно задавать дочерние элементы для вывода
 * Class FatContentElement
 * @package Ctrlv\Lardmin\ContentBuilder\Elements
 */
abstract class FatContentElement implements iElement {

    protected $view_params;

    protected $children;

    protected $view_name;

    public function setViewParams(array $view_params) {
        $this->view_params = $view_params;
    }

    public function push(iElement $element) {
        $this->children[] = $element;
    }

    public function getElement(): View
    {
        $params = $this->view_params;
        $params['_children'] = $this->children ?? [];

        return view($this->view_name)->with($params);
    }
}
