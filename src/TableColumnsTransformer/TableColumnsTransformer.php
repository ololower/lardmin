<?php

namespace Ctrlv\Lardmin\TableColumnsTransformer;

use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Schema\Column;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

/**
 * Трансфромация столбцов таблицы к формату, необходимому для вывода формы и ее обработки
 * Class TableColumnsTransformer
 * @package Ctrlv\Lardmin\TableColumnsTransformer
 */
class TableColumnsTransformer {

    /**
     * @var AbstractSchemaManager
     */
    private $schema_manager;

    /**
     * @var Model
     */
    private $model;


    /**
     * Список редактируемых полей при добавлении и редактировании модели
     * @var array
     */
    private $main_section_columns;

    public function __construct(Model $model) {
        $this->model = $model;

        $this->schema_manager = Schema::getConnection()->getDoctrineSchemaManager();

        $this->setMainSectionColumns();

    }

    /**
     * Устанавливает какие поля будут редактируемыми при создании и редактировании модели
     * При установке полей учитываются поля, которые заданы у модели
     */
    private function setMainSectionColumns() {

        $editable_fields_names = $this->model->editableFieldsNames ?? [];

        $columns = collect($this->schema_manager->listTableColumns($this->model->getTable()))
        ->filter(function (Column $item) use ($editable_fields_names) {
            return (empty($editable_fields_names) || in_array($item->getName(), $editable_fields_names));
        });

        $this->main_section_columns = $columns->toArray();
    }

    /**
     * Поля для вывода
     * @return \Illuminate\Support\Collection
     */
    public function getMainSectionFields() {

        $names = $this->model->listPropsNames ?? [];

        return collect($this->main_section_columns)->mapWithKeys(function (Column $column, $column_name) use ($names) {

            $props = [
                'name' => $column->getName(),
                'type' => $this->convertDbTypeToInputType($column->getType()->getName()),
                'label' => $names[$column->getName()] ?? $column->getName(),
                'value' => $this->model->{$column->getName()} ?? $column->getDefault()
//                'readonly' => true,
            ];

            return [$column_name => $props];
        });
    }

    /**
     * Default validation rules from doctrine's columns
     * @return array
     */
    public function getMainSectionValidationRules() {
        return collect($this->main_section_columns)->map(function (Column $column) {
            $rules = [];

            if ($column->getNotnull()) {
                $rules[] = 'required';
            }

            return $rules;
        })->filter(function ($rules) {
            return count($rules);
        })->map(function ($rules) {
            return implode("|", $rules);
        })->toArray();
    }

    private function convertDbTypeToInputType(string $db_type) {

        $types_overrides = [
            'bigint' => 'number'
        ];

        return (isset($types_overrides[$db_type])) ? $types_overrides[$db_type] : 'text';
    }
}
