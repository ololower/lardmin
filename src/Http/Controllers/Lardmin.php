<?php

namespace Ctrlv\Lardmin\Http\Controllers;


use Ctrlv\Lardmin\Http\Helpers\ModelUrlTransformer;
use Illuminate\Http\Request;

class Lardmin extends LardminBaseController
{
    protected $modelName;
    protected $model;


    public function __construct(Request $request) {
        parent::__construct();

        $this->model = ModelUrlTransformer::toModel($request->route()->uri());
    }

    public function index() {
        return view(self::VIEW_LIST_NAME);
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
