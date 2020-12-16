<?php

namespace Ctrlv\Lardmin\Generators;

use Ctrlv\Lardmin\Http\Helpers\ModelUrlTransformer;

/**
 * Генератор данных для хлебных крошек на основе uri страницы
 *
 * Class BreadcrumbGenerator
 * @package Ctrlv\Lardmin\Generators
 */
class BreadcrumbGenerator {
    private $model_classname;

    private $breadcrumb_items = [];
    private $menu_items = [];

    public function __construct($request_uri) {
        $this->model_classname = ModelUrlTransformer::getModelClassnameFromUri($request_uri);

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

    public function getBreadcrumbsItems() {
        return $this->breadcrumb_items;
    }

    private function attemptGenerate() {

        // Парсим uri для определения модели

        $current_item = collect($this->menu_items)->firstWhere('model', $this->model_classname);

        $this->push($current_item['title']);
//        dd($current_item);
        //
    }
}
