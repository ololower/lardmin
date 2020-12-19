<?php

namespace Ctrlv\Lardmin\ContentBuilder\Elements\Containers;

use Ctrlv\Lardmin\ContentBuilder\Elements\FatContentElement;
use Ctrlv\Lardmin\ContentBuilder\Elements\iElement;

/**
 * Контейнер в полную ширину экрана
 * Class FullWidthContainer
 * @package Ctrlv\Lardmin\ContentBuilder\Elements\Containers
 */
class SidebarContainer extends FatContentElement {


    public function push(iElement $element) {
        $this->children['main'][] = $element;
    }

    public function pushSidebar(iElement $element) {
        $this->children['sidebar'][] = $element;
    }

    protected $view_name = "lardmin::page-content.containers.with-sidebar";

}
