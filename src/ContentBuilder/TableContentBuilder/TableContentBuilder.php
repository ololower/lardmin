<?php

namespace Ctrlv\Lardmin\ContentBuilder\TableContentBuilder;

use Ctrlv\Lardmin\ContentBuilder\ContentBuilder;
use Ctrlv\Lardmin\ContentBuilder\ContentBuilderMaster;
use Illuminate\Database\Eloquent\Model;

/**
 * @deprecated
 * Class TableContentBuilder
 * @package Ctrlv\Lardmin\ContentBuilder\TableContentBuilder
 */
class TableContentBuilder extends ContentBuilderMaster implements ContentBuilder {

    private $items_per_page;

    public function __construct(Model $model, $outputConfiguration = [])
    {
        parent::__construct($model, $outputConfiguration);
        $this->items_per_page = 15;
    }

    public function getHtmlOutput(): string
    {
        // Парсим данные из конфигурации вывода
        $column_names = $this->outputConfiguration->flatMap(function ($column) {
            if (is_array($column['content'])) {
                return $column['content'];
            }

            return array_map('trim', explode(',', $column['content']));
        })->unique()->toArray();

        // Достаем нужные поля из моделей

        // Группируем поля согласно конфигурации вывода

        // Возвращаем верстку для таблиц

        $column_names = $this->outputConfiguration->flatMap(function ($column) {
            if (is_array($column['content'])) {
                return $column['content'];
            }

            return array_map('trim', explode(',', $column['content']));
        })->unique()->toArray();

        $records = collect([]);
        $paginated = $this->model->select($column_names)->paginate($this->items_per_page);

        foreach ($paginated as $record) {
            $_record = [];
            foreach ($column_names as $column_name) {
                $_record[$column_name] = $record->{$column_name};
            }

            $records->push($_record);
        }

        dump($records->toArray());
        return 'it\'s a row jack';
    }

    /**
     * Преобразовывает конфигурацию вывода в многомерный массив
     */
    private function transformOutputConfiguration() {

    }

    public function setHeading(string $heading): ContentBuilder
    {
        // TODO: Implement setHeading() method.
    }

    public function setContent(): ContentBuilder
    {
        // TODO: Implement setContent() method.
    }

    public function getView()
    {
        // TODO: Implement getView() method.
    }
}
