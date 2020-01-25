<?php

namespace app\models\enums;

use yii2mod\enum\helpers\BaseEnum;

class Role extends BaseEnum
{
    public const ADMIN = 1;
    public const USER = 2;
    public const MANAGER = 3;

    public static $list = [
        self::ADMIN => 'admin',
        self::USER => 'user',
        self::MANAGER => 'manager'
    ];
}