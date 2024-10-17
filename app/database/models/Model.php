<?php

namespace app\database\models;

use app\database\Connect;

abstract class Model
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = Connect::connect();
    } // construct
}
