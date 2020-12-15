<?php
namespace Ctrlv\Lardmin\ContentBuilder\Elements\Table;

use Ctrlv\Lardmin\ContentBuilder\Elements\FlatContentElement;

class Table extends FlatContentElement {

    /**
     * Table constructor.
     * @param array $heading_row элементы массива служат заголовками
     * @param array $rows контент таблицы
     * @param string|null $text_empty текст, если контент пуст
     */
    public function __construct(array $heading_row, array $rows, $text_empty = null) {
        $this->view_params['heading_row'] = $heading_row;
        $this->view_params['rows'] = collect($rows);
        $this->view_params['empty_text'] = $text_empty ?? "Записей не найдено!";
    }

    public function setPagination($pagination) {
        $this->view_params['pagination'] = $pagination;
    }

    protected $view_name = "lardmin::page-content.table.table";
}
