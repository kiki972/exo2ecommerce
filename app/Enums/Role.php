<?php

namespace App\Enums;

enum Role: string 
{
    case Admin = 'admin';
    case Guest = 'guest';
}