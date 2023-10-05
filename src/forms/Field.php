<?php

namespace forms;

require_once ROOT_DIR . "src/bases/BaseField.php";
require_once ROOT_DIR . "src/models/UserModel.php";
require_once ROOT_DIR . "src/models/SongModel.php";

use bases\BaseField;
use cores\Model;

class Field extends BaseField {
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_FILE = 'file';
    const TYPE_DATE = 'date';

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }

    public function renderInput()
    {
        return sprintf(
            '<input type="%s" class="form-control%s" name="%s" value="%s">',
            $this->type,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function fileField() {
        $this->type = self::TYPE_FILE;
        return $this;
    }

    public function dateField() {
        $this->type = self::TYPE_DATE;
        return $this;
    }
}