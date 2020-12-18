<?php

namespace Ctrlv\Lardmin\Generators;

/**
 * Генератор данных для хлебных крошек на основе uri страницы
 *
 * Class BreadcrumbGenerator
 * @package Ctrlv\Lardmin\Generators
 */
class BreadcrumbGenerator {
    private $url_generator;

    private $breadcrumb_items = [];
    private $menu_items = [];

    public function __construct(UrlGenerator $url_generator) {
        $this->url_generator = $url_generator;

        $menu_generator = new MenuGenerator();
        $this->menu_items = $menu_generator->getMenuItems();

        $this->attemptGenerate();
    }

    /**
     * Добавить новый пункт хлебных крошек
     * @param string $title
     * @param string $url
     */
    public function push(string $title, string $url = '#') {
        $this->breadcrumb_items[] = [
            'title' => $title,
            'url' => $url
        ];
    }

    /**
     * Получить все элементы для хлебных крошек
     * @return array
     */
    public function getBreadcrumbsItems() {
        return $this->breadcrumb_items;
    }

    /**
     * Пытаемся создать URL из текущей модели
     */
    private function attemptGenerate() {

        $current_item = collect($this->menu_items)->map(function ($item) {
            if (isset($item['model'])) {
                $item['model'] = collect(explode("\\", $item['model']))->map(function ($part) {
                    return strtolower($part);
                })->implode('_');
            }
            return $item;
        })->firstWhere('model', $this->url_generator->getIndexPath());

        $this->push($current_item['title']);

    }
}
