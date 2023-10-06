<?php

namespace forms;

require_once ROOT_DIR . "src/bases/BaseField.php";
require_once ROOT_DIR . "src/models/UserModel.php";
require_once ROOT_DIR . "src/models/SongModel.php";

use bases\BaseField;
use bases\BaseModel;

class Field extends BaseField
{
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_FILE = 'file';
    const TYPE_DATE = 'date';

    public function __construct(BaseModel $model, string $attribute)
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
            $this->model->get($this->attribute),
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function imageFileField()
    {
        $this->type = self::TYPE_FILE;
        // return $this;
        return sprintf(
            '<input type="%s" class="form-control%s" name="%s" value="%s" id="input-file" accept="image/*">',
            $this->type,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->get($this->attribute),
        );
    }

    public function audioFileField()
    {
        $this->type = self::TYPE_FILE;
        // return $this;
        return sprintf(
            '<input type="%s" class="form-control%s" name="%s" value="%s" id="input-file" accept="audio/*">',
            $this->type,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->get($this->attribute),
        );
    }

    public function dateField()
    {
        $this->type = self::TYPE_DATE;
        return $this;
    }
}
