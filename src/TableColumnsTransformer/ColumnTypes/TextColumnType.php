<?php

namespace Ctrlv\Lardmin\TableColumnsTransformer\ColumnTypes;

use Ctrlv\Lardmin\ContentBuilder\Elements\Forms\Input;
use Ctrlv\Lardmin\ContentBuilder\Elements\iElement;

class TextColumnType extends ColumnType {

    private $element;

    public function __construct($props) {
        $element = new Input($props['name'], $props['type']);

        $element->setLabel($props['label']);

        // possible props
        isset($props['value']) ? $element->setValue($props['value']) : null;
        isset($props['placeholder']) ? $element->setPlaceholder($props['placeholder']) : null;
        isset($props['readonly']) ? $element->setReadonly() : null;

        $this->element = $element;
    }

    public function getFormElement(): iElement
    {
        return $this->element;
    }
}
