<?php

namespace Ctrlv\Lardmin\ContentBuilder\Presets;

use Ctrlv\Lardmin\ContentBuilder\Elements\Breadcrumbs\Breadcrumbs;
use Ctrlv\Lardmin\ContentBuilder\Elements\Containers\FullWidthContainer;
use Ctrlv\Lardmin\ContentBuilder\Elements\Containers\SidebarContainer;
use Ctrlv\Lardmin\ContentBuilder\Elements\iElement;
use Ctrlv\Lardmin\ContentBuilder\Elements\WelcomeHeading\WelcomeHeading;
use Ctrlv\Lardmin\ContentBuilder\PageContent;
use Ctrlv\Lardmin\ContentBuilder\Presets\Traits\HasActions;
use Ctrlv\Lardmin\ContentBuilder\Presets\Traits\HasBreadcrumbs;
use Ctrlv\Lardmin\ContentBuilder\Presets\Traits\HasHeading;
use Ctrlv\Lardmin\ContentBuilder\Wrappers\Wrapper;
use Ctrlv\Lardmin\ContentBuilder\Wrappers\Wrapperable;
use Illuminate\Contracts\View\View;

/**
 * Предустановленные типы шаблонов контента
 * следует использовать в случаях, когда нужно модифицировать вывод контента
 * переопределяют метод getPageContent, добавляя свой iElement
 * так-же могут добавлять новые секции для вывода контента
 *
 * Class FullWidthContent
 * @package Ctrlv\Lardmin\ContentBuilder\Presets
 */
class SidebarContent extends PageContent {

    use HasBreadcrumbs,
        HasHeading,
        HasActions;

    /**
     * Контейнер в который будут добавлены все динамические элементы страницы
     * @var FullWidthContainer
     */
    private $container;
    private $container_wrappers = [];

    public function __construct() {
        $this->container = new SidebarContainer();
    }

    /**
     * Динамические элементы попадают в конейнер, а не в список элементов
     * (по сути - обертка в div)
     * @param iElement $element
     */
    public function push(iElement $element)
    {
        $this->container->push($element);
    }

    public function pushSidebar(iElement $element)
    {
        $this->container->pushSidebar($element);
    }

    public function addContainerWrapper(Wrapper $wrapper)
    {
        $this->container_wrappers[] = $wrapper;
    }

    public function getPageContent() : View
    {
        foreach ($this->container_wrappers as $container_wrapper) {
            if ($this->container instanceof Wrapperable) {
                $this->container->addWrapper($container_wrapper);
            }
        }

        array_unshift($this->elements, $this->container);
        array_unshift($this->elements, (new WelcomeHeading($this->heading, $this->actions)));
        array_unshift($this->elements, (new Breadcrumbs($this->breadcrumbs)));

        return view('lardmin::page-builder')->with([
            'elements' => $this->elements,
            'side_elements' => []
        ]);
    }
}
