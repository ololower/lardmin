<?php

namespace Ctrlv\Lardmin\ContentBuilder\Wrappers;

class FormWrapper extends Wrapper {

    /**
     * @var string
     */
    private $open_tag = "<form>";
    /**
     * @var string
     */
    private $close_tag = "</form>";

    /**
     * @var string
     */
    private $form_name_attribute;


    public function __construct(string $action, string $method, string $name, bool $use_csrf = true)
    {
        $this->form_name_attribute = $name;

        if (in_array($method, ['get', 'post'])) {
            $open_tag_template = "<form action='%s' method='%s' name='%s' id='%s'>";
            $this->open_tag = sprintf($open_tag_template, $action, $method, $name, $name);
        } else {
            $open_tag_template = "<form action='%s' name='%s' id='%s'>";
            $this->open_tag = sprintf($open_tag_template, $action, $name, $name);
            $this->open_tag .= method_field($method);
        }

        if ($use_csrf) {
            $this->open_tag .= csrf_field();
        }
    }

    public function getOpenTag()
    {
        return $this->open_tag;
    }

    public function getCloseTag()
    {
        return $this->close_tag;
    }

    public function getFormNameAttribute() {
        return $this->form_name_attribute;
    }


}
