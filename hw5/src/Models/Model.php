<?php

namespace MyApp\Models;

use MyApp\App;
use MyApp\DB;

abstract class Model
{
    protected static function db(): DB
    {
        return App::getInstanse()->getDB();
    }

    protected static function link(): \PDO
    {
        return App::getInstanse()->getDB()->getLink();
    }
}