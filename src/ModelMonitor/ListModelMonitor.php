<?php

namespace Ctrlv\Lardmin\ModelMonitor;


class ListModelMonitor extends ModelMonitor {


    protected function setLocalProperty(): void
    {
        $customer_props = collect($this->model->listProps ?? []);

        // Добавляем id во все таблицы
        !$customer_props->has('id') ? $customer_props->prepend('id') : null;

        $this->property = $customer_props->toArray();

    }

    public function getPropertyTitle($property_name) {
        $props_names = $this->model->listPropsNames;

        return isset($props_names[$property_name]) ? $props_names[$property_name] : $property_name;
    }


}
