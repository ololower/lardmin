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
            return
                (empty($editable_fields_names) || in_array($item->getName(), $editable_fields_names));
        });

        $this->main_section_columns = $columns->toArray();
    }

    /**
     * Поля для вывода
     * @param array $form_props customer params for building form
     * @return \Illuminate\Support\Collection
     */
    public function getMainSectionFields($form_props = []) {

        $names = $this->model->listPropsNames ?? [];

        return collect($this->main_section_columns)
            ->mapWithKeys(function (Column $column, $column_name) use ($names, $form_props) {



            $customer_column =  ($form_props[$column->getName()]) ?? null;

            $field_name = $column->getName();

            $field_type = $customer_column['type']
                ?? $this->convertDbTypeToInputType($column->getType()->getName());

            $field_placeholder = $customer_column['placeholder'] ?? $field_name;

            $field_value = old($column->getName())
                ?? $this->model->{$column->getName()}
                ?? $column->getDefault();
            $props = [
                'name'          => $field_name,
                'type'          => $field_type,
                'placeholder'   => $field_placeholder,
                'label'         => $names[$column->getName()] ?? $column->getName(),
                'value'         => $field_value
//                'readonly' => true,
            ];

            return [$column_name => $props];
        });
    }

    /**
     * Default validation rules from doctrine's columns
     * @return array
     */
    public function getMainSectionValidationRules($form_props = []) {
        return collect($this->main_section_columns)
            ->map(function (Column $column) use ($form_props) {

                if (isset($form_props[$column->getName()]['validation'])) {
                    return array_map('trim',
                        explode("|", $form_props[$column->getName()]['validation'])
                    );
                }

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
