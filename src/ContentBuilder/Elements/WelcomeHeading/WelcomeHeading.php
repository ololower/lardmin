<?php
namespace Ctrlv\Lardmin\ContentBuilder\Elements\WelcomeHeading;

use Ctrlv\Lardmin\ContentBuilder\Elements\FlatContentElement;

/**
 * Приветственное сообщение над контентом
 * Class WelcomeHeading
 * @package Ctrlv\Lardmin\ContentBuilder\Elements\WelcomeHeading
 */
class WelcomeHeading extends FlatContentElement {

    public function __construct($heading, $actions = []) {
        $this->view_params['heading'] = $heading;
        $this->view_params['actions'] = $actions;
    }

    protected $view_name = "lardmin::page-content.welcome_heading.welcome_heading";

}
