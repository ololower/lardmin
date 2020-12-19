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
//    private $main_section_fields;

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
        $columns = collect($this->schema_manager->listTableColumns($this->model->getTable()));

        $this->main_section_columns = $columns->toArray();
    }

    public function getMainSectionFields() {
        $fields = collect($this->main_section_columns)->mapWithKeys(function (Column $column, $column_name) {
            return [$column_name => $column->getType()->getName()];
        });
        return $fields;
    }

    public function getMainSectionValidationRules() {

    }

    private function convertDbTypeToInputType(string $db_type) {
        //$input_type = 'inp'
        switch ($db_type) {
            case "bigint":
            case "string":
                break;

            default:

        }
    }


//    public function getRelation
}
