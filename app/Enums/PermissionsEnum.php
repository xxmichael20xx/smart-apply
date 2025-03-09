<?php

namespace App\Enums;

class PermissionsEnum extends BaseEnum
{
    public const LIST_USERS = 'list users';
    public const VIEW_USER = 'view user';
    public const CREATE_USER = 'create user';
    public const UPDATE_USER = 'update user';
    public const DELETE_USER = 'delete user';
    public const RESTORE_USER = 'restore user';
}