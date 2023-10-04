<?php

namespace forms;

require_once ROOT_DIR . "src/forms/Field.php";

use cores\Model;

class Form {
    public static function begin($action, $method, $options = []) {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "$key=\"$value\"";
        }
        echo sprintf('<form action="%s" method="%s" %s>', $action, $method, implode(" ", $attributes));
        return new Form();
    }

    public static function end() {
        echo '</form>';
    }

    public function field(Model $model, $attribute) {
        return new Field($model, $attribute);
    }
}