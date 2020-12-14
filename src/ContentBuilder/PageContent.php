<?php

namespace Ctrlv\Lardmin\ContentBuilder;

use Ctrlv\Lardmin\ContentBuilder\Elements\iElement;
use Illuminate\Contracts\View\View;

/**
 * Класс отвечает за вывод контента в админ-панель
 * выводит элементы в порядке их добавления списком
 *
 * Служит оберткой для создания предустановленных шаблонов
 *
 * Class PageContent
 * @package Ctrlv\Lardmin\ContentBuilder
 */
abstract class PageContent {

    /**
     * Список элементов для вывода
     * @var iElement[]
     */
    protected $elements = [];

    /**
     * Добавить новый элемент на страницу
     * @param iElement $element
     */
    public function push(iElement $element) {
        $this->elements[] = $element;
    }

    /**
     * Вывести страницу с заданными элементами
     * @return View
     */
    public abstract function getPageContent() : View;
}
