<?php

namespace Ctrlv\Lardmin\Http\Controllers;


class Lardmin extends LardminBaseController
{
    protected $modelName;
    protected $model;


    public function __construct($modelName) {
        parent::__construct();
        $this->model = new $modelName();
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
