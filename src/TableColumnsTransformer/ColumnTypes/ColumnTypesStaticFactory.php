<?php

namespace Ctrlv\Lardmin\TableColumnsTransformer\ColumnTypes;

final class ColumnTypesStaticFactory {

    public static function create(array $props) : ColumnType {

        // Check for required params
        if (!isset($props['type'])) throw new \Exception("Missing type param");
        if (!isset($props['name'])) throw new \Exception("Missing name param");
        if (!isset($props['label'])) throw new \Exception("Missing label param");

        switch ($props['type']) {

            default:
                $column_type = new TextColumnType($props);
        }

        return $column_type;
    }

}
