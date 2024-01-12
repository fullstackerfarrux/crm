<?php

namespace App\Core;

enum ApiItems: string
{
    case ID = 'id';

        // groups api items
    case TEACHER_ID = 'teacher_id';
    case GROUP_STACK = 'group_stack';
    case GROUP_DAY = 'group_day';
    case GROUP_TIME = 'group_time';

        // students api itmes
    case GROUP_ID = 'group_id';
    case STUDENT_NAME = 'student_name';
    case PARENT_NAME = 'parent_name';
    case STACK = 'stack';
    case STUDENT_PHONE = 'student_phone';
    case PARENT_PHONE = 'parent_phone';

        //teacher api items
    case TEACHER_NAME = 'teacher_name';
    case TEACHER_PHONE = 'teacher_phone';
    case TEACHER_PHOTO = 'teacher_photo';

        //user api items
    case NAME = 'name';
    case EMAIL = 'email';
    case PASSWORD = 'password';
}
