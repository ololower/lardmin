<?php

namespace Ctrlv\Lardmin\ContentBuilder\Elements;

use \Illuminate\Contracts\View\View;

/**
 * Элементом может быть как один html тег, так и группа тегов.
 * Interface iElement
 * @package Ctrlv\Lardmin\ContentBuilder\Elements
 */
interface iElement {

    /**
     * Параметры, которые передается во view для элемента
     * @param array $params
     * @return mixed
     */
    public function setViewParams(array $params);

    /**
     * Добавить дочерние элементы
     * @param iElement $element
     * @return mixed
     */
    public function push(iElement $element);

    /**
     * Получить view
     * @return View
     */
    public function getElement() : View;

}
