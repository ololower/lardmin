<?php

namespace Ctrlv\Lardmin\Http\Controllers;


use App\Models\User;
use Ctrlv\Lardmin\ContentBuilder\ContentBuilderDirector;
use Ctrlv\Lardmin\ContentBuilder\Elements\Breadcrumbs\Breadcrumbs;
use Ctrlv\Lardmin\ContentBuilder\Elements\Table\Table;
use Ctrlv\Lardmin\ContentBuilder\Presets\FullWidthContent;
use Ctrlv\Lardmin\Generators\BreadcrumbGenerator;
use Ctrlv\Lardmin\Generators\UrlGenerator;
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

    /**
     * Генератор хлебных крошек
     * @var BreadcrumbGenerator
     */
    private $breadcrumb_generator;

    public function __construct(Request $request,
                                UrlGenerator $url_generator,
                                BreadcrumbGenerator $breadcrumb_generator) {
        parent::__construct();

        $this->model = $url_generator->getModel();

        $this->breadcrumb_generator = $breadcrumb_generator;


    }

    /**
     * Список записей
     * @param ListModelMonitor $monitor
     * @return \Illuminate\Contracts\View\View
     */
    public function index(ListModelMonitor $monitor) {

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
        $pageContent->setBreadcrumbs($this->breadcrumb_generator->getBreadcrumbsItems());

        // todo логика для сортировки записей
        // todo логика для фильтрафии записей

        // Заголовки таблицы
        $titles = collect($props)->map(function ($item, $key) use ($monitor) {
            $property_name = (is_callable($item)) ? $key : $item;
            return $monitor->getPropertyTitle($property_name);
        })->toArray();

        $table = new Table($titles, $results);
        $table->setPagination($paginated->links());
        $pageContent->push($table);

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
