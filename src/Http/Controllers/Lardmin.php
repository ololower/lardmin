<?php

namespace Ctrlv\Lardmin\Http\Controllers;


use App\Models\User;
use Ctrlv\Lardmin\ContentBuilder\ContentBuilderDirector;
use Ctrlv\Lardmin\ContentBuilder\Elements\Breadcrumbs\Breadcrumbs;
use Ctrlv\Lardmin\ContentBuilder\Elements\Table\Table;
use Ctrlv\Lardmin\ContentBuilder\Presets\FullWidthContent;
use Ctrlv\Lardmin\Http\Helpers\ModelUrlTransformer;
use Ctrlv\Lardmin\ModelMonitor\ListModelMonitor;
use Illuminate\Http\Request;
use Ctrlv\Lardmin\ContentBuilder\PageContent;

/**
 * Class Lardmin
 * @package Ctrlv\Lardmin\Http\Controllers
 * @property $model
 */
class Lardmin extends LardminBaseController
{
    protected $modelName;

    protected $model;


    public function __construct(Request $request) {
        parent::__construct();

        $this->model = ModelUrlTransformer::toModel($request->route()->uri());
    }

    /**
     * Список записей
     * @param ListModelMonitor $monitor
     * @return \Illuminate\Contracts\View\View
     */
    public function index(ListModelMonitor $monitor) {

        $breadcrumbs = [
            [
                'name' => 'Хлебная',
                'url' => '#'
            ],
            [
                'name' => 'Хлебная',
                'url' => '#'
            ]
        ];

        $monitor->watch($this->model);
        $props = $monitor->getProperties();

        $paginated = $this->model->paginate(15);

        $results = [];
        foreach ($paginated as $item) {
            $_result = [];
            foreach ($props as $key => $prop) {

                if (is_callable($prop)) {
                    $value = $prop($item->{$key});
                } else {
                    $value = $item->{$prop};
                }

                $_result[] = $value;
            }
            $results[] = $_result;
        }

        $pageContent = new FullWidthContent();
        $pageContent->setHeading("Это просто заголовок");
        $pageContent->setBreadcrumbs($breadcrumbs);

        // todo логика для сортировки записей
        // todo логика для фильтрафии записей

        $titles = collect($props)->map(function ($item, $key) use ($monitor) {
            $property_name = (is_callable($item)) ? $key : $item;
            return $monitor->getPropertyTitle($property_name);
        })->toArray();

        $table = new Table($titles, $results);
        $table->setPagination($paginated->links());
        $pageContent->push($table);

        // todo добавить вывод пагинации


        return $pageContent->getPageContent();

    }

    public function show() {
        //
    }

    public function store() {

    }

    public function delete() {
        //
    }


}
