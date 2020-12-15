<?php
namespace Ctrlv\Lardmin\ContentBuilder\Elements\Table;

use Ctrlv\Lardmin\ContentBuilder\Elements\FlatContentElement;

class Table extends FlatContentElement {

    /**
     * Table constructor.
     * @param array $heading_row элементы массива служат заголовками
     * @param array $rows контент таблицы
     * @param string $text_empty текст, если контент пуст
     */
    public function __construct(array $heading_row, array $rows, $text_empty = '') {
        $this->view_params['heading_row'] = $heading_row;
        $this->view_params['rows'] = collect($rows);
    }

    protected $view_name = "lardmin::page-content.table.table";
}
