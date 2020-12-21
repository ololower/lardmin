<?php

namespace Ctrlv\Lardmin\Http\Controllers;


use App\Models\User;
use Ctrlv\Lardmin\ContentBuilder\Elements\Forms\Input;
use Ctrlv\Lardmin\ContentBuilder\Elements\Table\Table;
use Ctrlv\Lardmin\ContentBuilder\Presets\FullWidthContent;
use Ctrlv\Lardmin\ContentBuilder\Presets\SidebarContent;
use Ctrlv\Lardmin\Generators\BreadcrumbGenerator;
use Ctrlv\Lardmin\Generators\UrlGenerator;
use Ctrlv\Lardmin\ModelMonitor\ListModelMonitor;
use Ctrlv\Lardmin\TableColumnsTransformer\ColumnTypes\ColumnTypesStaticFactory;
use Ctrlv\Lardmin\TableColumnsTransformer\TableColumnsTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

/**
 * Class Lardmin
 * @package Ctrlv\Lardmin\Http\Controllers
 * @property Model $model
 */
class Lardmin extends LardminBaseController
{
    protected $modelName;

    /**
     * @var Model
     */
    protected $model;
    protected $url_generator;

    /**
     * Генератор хлебных крошек
     * @var BreadcrumbGenerator
     */
    private $breadcrumb_generator;

    public function __construct(Request $request,
                                UrlGenerator $url_generator,
                                BreadcrumbGenerator $breadcrumb_generator) {
        parent::__construct();

        $this->url_generator = $url_generator;
        $this->model = $url_generator->getModel();

        $this->breadcrumb_generator = $breadcrumb_generator;


    }

    /**
     * Список записей
     * @param ListModelMonitor $monitor
     * @return \Illuminate\Contracts\View\View
     */
    public function index(ListModelMonitor $monitor) {


        $pageContent = new FullWidthContent();
        $pageContent->setHeading("Все записи");
        $pageContent->setBreadcrumbs($this->breadcrumb_generator->getBreadcrumbsItems());

        $pageContent->addLinkAction('Добавить', $this->url_generator->getCreateUrl());

        $monitor->watch($this->model);
        $props = $monitor->getProperties();

        $paginated = $this->model->paginate(15);

        $results = [];
        foreach ($paginated as $item) {

            $_result = [];
            foreach ($props as $key => $prop) {
                $_result[] = $item->{$prop};
            }

            // Edit list action
            $_result['actions'] = [];
            $_result['actions']['edit'] = [
                'url' => $this->url_generator->getEditUrl($item->id),
                'text' => "Edit",
                'color' => 'indigo'
            ];
            $_result['actions']['delete'] = [
                'url' => $this->url_generator->getEditUrl($item->id),
                'text' => "Delete",
                'color' => 'red'
            ];

            $results[] = $_result;
        }


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

    public function create() {
        $pageContent = new SidebarContent();
        $pageContent->setHeading("Добавить...");
        $pageContent->setBreadcrumbs($this->breadcrumb_generator->getBreadcrumbsItems());

        // Model's main fields
        $table_columns_transformer = new TableColumnsTransformer($this->model);
        $columns = $table_columns_transformer->getMainSectionFields();

        foreach ($columns as $column) {
            $element = ColumnTypesStaticFactory::create($column);
            $pageContent->push($element->getFormElement());
        }

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
