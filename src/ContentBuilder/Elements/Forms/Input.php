<?php

namespace Ctrlv\Lardmin\ContentBuilder\Elements\Forms;

use Ctrlv\Lardmin\ContentBuilder\Elements\FlatContentElement;
use Illuminate\Support\Str;

class Input extends FlatContentElement {

    protected $view_name = "lardmin::page-content.form-elements.input";

    public function __construct(string $name, string $type = 'text') {
        $this->setType($type);
        $this->view_params['id'] = $type . '-' . $name . '-' . Str::random(6);
        $this->view_params['name'] = $name;
        $this->view_params['label'] = $name;
        $this->view_params['placeholder'] = $name;
        $this->view_params['readonly'] = false;
        $this->view_params['value'] = "";
    }

    /**
     * Set the input value property
     * @param string $value
     */
    public function setValue(string $value) {
        $this->view_params['value'] = $value;
    }

    /**
     * Set input's name
     * @param $name
     */
    public function setName($name) {
        $this->view_params['name'] = $name;
    }

    /**
     * Set input's type
     * @param string $type
     */
    public function setType(string $type = 'text') {
        $allowed_types = ['text', 'number', 'email', 'tel'];

        $this->view_params['type'] = in_array($type, $allowed_types) ? $type : 'text';
    }

    /**
     * Set input's label text
     * @param $label
     */
    public function setLabel(string $label) {
        $this->view_params['label'] = $label;
    }

    /**
     * Set input's placeholder
     * @param string $placeholder
     */
    public function setPlaceholder(string $placeholder) {
        $this->view_params['placeholder'] = $placeholder;
    }

    /**
     * Add readonly flag
     */
    public function setReadonly() {
        $this->view_params['readonly'] = true;
    }


}
