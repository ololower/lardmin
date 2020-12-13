<?php
namespace Ctrlv\Lardmin\Http\Helpers;

use Illuminate\Database\Eloquent\Model;

final class ModelUrlTransformer {

    /**
     * Получить uri из модели
     * @param string $model_classname
     * @return string
     */
    public static function toUrl(string $model_classname) : string {
        return str_replace("\\", "_", strtolower($model_classname));
    }

    /**
     * Получить объект модели из uri
     * @param string $uri
     * @return Model
     * @throws \Exception
     */
    public static function toModel(string $uri) : Model {

        $prefix_path = config('lardmin.admin_url_prefix') . '/';
        $model_path = str_replace($prefix_path, '', $uri);

        $model_classname = collect(explode("_", $model_path))->map(function ($part) {
            return ucfirst($part);
        })->implode('\\');

        if (class_exists($model_classname)) {
            return new $model_classname();
        } else {
            $error_message = "Cant transform {$model_path} to model. \r\n Be sure that your model name is in \"ucfirst\" syntax.";
            throw new \Exception($error_message);
        }
    }


}
