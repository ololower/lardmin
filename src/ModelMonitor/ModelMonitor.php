<?php

namespace Ctrlv\Lardmin\ModelMonitor;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс для того, чтобы доставать заданные свойства из пользовательских моделей
 * Class ModelMonitor
 * @package Ctrlv\Lardmin\ModelMonitor
 */
abstract class ModelMonitor {

    protected $model;

    protected $property;
    /**
     * Установить модель за которой происходит наблюдение
     * @param Model $model
     */
    public function watch(Model $model) : void {
        $this->model = $model;
        $this->setLocalProperty();
    }

    /**
     * Устанавливает правило для получения свойств
     * @return mixed
     */
    abstract protected function setLocalProperty() : void;

    /**
     * Получить свойства для работы в клиентском коде
     * @return array
     */
    public function getProperties() : array {
        return $this->property;
    }

}
