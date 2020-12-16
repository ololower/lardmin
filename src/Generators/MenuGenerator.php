<?php

namespace Ctrlv\Lardmin\Generators;

class MenuGenerator {
    private $menu_items = [];

    public function __construct() {
        $this->menu_items = config('lardmin.nav_menu_items');
    }

    /**
     * @return array
     */
    public function getMenuItems()
    {
        return $this->menu_items;
    }
}
