<?php

namespace Ctrlv\Lardmin\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class LardminBaseController extends BaseController {

    const VIEW_LIST_NAME = 'lardmin::template.list';

    const VIEW_FROM_NAME = 'lardmin::template.form';

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $this->shareNavMenu();
    }

    /**
     * Передаем меню админ-панельки в view
     */
    private function shareNavMenu() {
        $nav_menu_sections = config('lardmin.nav_menu_sections');
        $nav_menu_items = collect(config('lardmin.nav_menu_items'));

        $nav_menu = [];
        foreach ($nav_menu_sections as $nav_menu_section) {

            $sub_menu_items = $nav_menu_items->filter(function($item) use ($nav_menu_section) {
                return $item['section_key'] == $nav_menu_section['key'];
            });

            if ($sub_menu_items->isNotEmpty()) {
                $nav_menu[] = [
                    'key' => $nav_menu_section['key'],
                    'title' => $nav_menu_section['title'],
                    'items' => $sub_menu_items
                ];
            }

        }

        view()->share('nav_menu', $nav_menu);
    }
}
