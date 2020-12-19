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

    public function create() {
        $pageContent = new SidebarContent();
        $pageContent->setHeading("Добавить...");
        $pageContent->setBreadcrumbs($this->breadcrumb_generator->getBreadcrumbsItems());

        // Определение полей основного контента
        // Основные поля для модели
        $table_columns_transformer = new TableColumnsTransformer($this->model);
        $columns = $table_columns_transformer->getMainSectionFields();
//        $schema_manager = Schema::getConnection()->getDoctrineSchemaManager();
//        $columns = $schema_manager->listTableColumns($this->model->getTable());

//        dd($columns);


        $input = new Input();
        $pageContent->push($input);
        $pageContent->push($input);
        $pageContent->push($input);
        $pageContent->pushSidebar($input);
        // Определение полей для зависимостей


        //dd($user->first()->getFillable());
//        dd($this->model);
        // todo логика для фильтрафии записей


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
