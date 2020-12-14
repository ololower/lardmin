<?php
namespace Ctrlv\Lardmin\ContentBuilder\Elements\Breadcrumbs;

use Ctrlv\Lardmin\ContentBuilder\Elements\ContentElement;
use Ctrlv\Lardmin\ContentBuilder\Elements\FlatContentElement;

/**
 * Вывод хлебных крошек на странице
 * Class Breadcrumbs
 * @package Ctrlv\Lardmin\ContentBuilder\Elements\Breadcrumbs
 */
class Breadcrumbs extends FlatContentElement {

    /**
     * View path, который выводит содержимое этого элемента
     * @var string
     */
    protected $view_name = "lardmin::page-content.breadcrumbs.breadcrumbs";

    /**
     * Breadcrumbs constructor.
     * @param array $breadcrumbs_data
     */
    public function __construct(array $breadcrumbs_data) {
        $this->view_params['breadcrumbs'] = $breadcrumbs_data;
    }
}
