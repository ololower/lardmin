<?php

namespace Ctrlv\Lardmin\ContentBuilder\Elements\Containers;

use Ctrlv\Lardmin\ContentBuilder\Elements\FatContentElement;
use Ctrlv\Lardmin\ContentBuilder\Elements\iElement;
use Ctrlv\Lardmin\ContentBuilder\Presets\Traits\HasWrapper;
use Ctrlv\Lardmin\ContentBuilder\Wrappers\Wrapperable;

/**
 * Контейнер в полную ширину экрана
 * Class FullWidthContainer
 * @package Ctrlv\Lardmin\ContentBuilder\Elements\Containers
 */
class SidebarContainer extends FatContentElement implements Wrapperable {

    use HasWrapper;

    public function push(iElement $element) {
        $this->children['main'][] = $element;
    }

    public function pushSidebar(iElement $element) {
        $this->children['sidebar'][] = $element;
    }

    protected $view_name = "lardmin::page-content.containers.with-sidebar";

}
