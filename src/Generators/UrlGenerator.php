<?php

namespace Ctrlv\Lardmin\Generators;

use Illuminate\Http\Request;

class UrlGenerator {

    /**
     * Код сущности с которым работает
     * @var
     */
    private $index_path;

    /**
     * URI текущей страницы
     * @var
     */
    private $current_uri;

    /**
     * Возможные значения:
     * index | create | update | delete
     * @var string
     */
    private $controller_action; //

    /**
     * ModelUrlTransformer constructor.
     */
    public function __construct($current_uri = null) {
        $prefix_path = config('lardmin.admin_url_prefix') . '/';

        if ($current_uri) {
            $this->current_uri = $current_uri;
            $this->index_path = str_replace($prefix_path, '', $current_uri);
            $this->controller_action = 'index';
        } else {
            // Конфигурация для главной страницы
        }

    }

    /**
     * Создаст объект на основе полного названия класса
     */
    public static function getInstanceFromClassname($classname) {
        $classname = str_replace("\\", "_", strtolower($classname));
        return new static($classname);
    }

    /**
     * Возвращает модель, которая связанна с текущим url
     * @return mixed
     * @throws \Exception
     */
    public function getModel() {

        // Временная проверка, дальше по
        // здесь будет сеттинг для главной страницы и проверка не потребуется
        if ($this->index_path) {
            $model_classname = collect(explode("_", $this->index_path))->map(function ($part) {
                return ucfirst($part);
            })->implode('\\');

            if (class_exists($model_classname)) {
                return new $model_classname();
            } else {
                $error_message = "Cant transform {$this->index_path} to model. \r\n Be sure that your model name is in \"ucfirst\" syntax.";
                throw new \Exception($error_message);
            }
        }
    }

    public function getCurrentUri() {
        return $this->current_uri;
    }


    public function getIndexPath() {
        return $this->index_path;
    }


}