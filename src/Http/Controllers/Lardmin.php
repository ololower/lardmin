<?php

namespace Ctrlv\Lardmin\Http\Controllers;


use App\Models\User;
use Ctrlv\Lardmin\ContentBuilder\ContentBuilderDirector;
use Ctrlv\Lardmin\ContentBuilder\Elements\Breadcrumbs\Breadcrumbs;
use Ctrlv\Lardmin\ContentBuilder\Presets\FullWidthContent;
use Ctrlv\Lardmin\Http\Helpers\ModelUrlTransformer;
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

    public function index() {

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


        $pageContent = new FullWidthContent();
        $pageContent->setHeading("Это просто заголовок");
//        $pageContent->setActions("Это просто заголовок");
        $pageContent->setBreadcrumbs($breadcrumbs);
        //$pageContent->addContentElement();
//        $pageContent->addContentElement();

        return $pageContent->getPageContent();
        // Поля задаются юзером для кастомизации вывода в таблицах
        $custom_columns = [
            [
                'title' => 'ID',
                'content' => 'id' // column name, allowed: 'column1' || 'column1, column2' || ['column1', 'column2']
            ],
            [
                'title' => 'Имя пользователя',
                'content' => 'name, email'
            ],
            [
                'title' => 'Имя пользователя',
                'content' => ['name', 'email']
            ]
        ];

//        $content = $builderDirector->buildTable($this->model, $custom_columns);

        return view(self::VIEW_LIST_NAME)->with([
            //'content' => $content,
            'records' => collect([]),
        ]);
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
