<?php

use Phalcon\Mvc\Model;

class Tasks extends Model
{
    public $id;
    public $name;
    public $created_at;
    public $updated_at;
}