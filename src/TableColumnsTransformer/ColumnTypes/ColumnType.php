<?php

namespace Ctrlv\Lardmin\TableColumnsTransformer\ColumnTypes;

use Ctrlv\Lardmin\ContentBuilder\Elements\iElement;

abstract class ColumnType {

    protected $props = [];

    abstract public function getFormElement() : iElement;

}
