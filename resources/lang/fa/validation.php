<?php


return [
    'integer' => ':attribute باید به صورت عددی باشد',
    'exists'  => ':attribute داخل سیستم وجود ندارد',
    'string'  => ':attribute باید به صورت صحیح وارد شود',
    'required'  => ':attribute الزامی میباشد',
    'email'  => ':attribute باید به صورت ایمیل باشد',
    'unique'  => ':attribute تکراری میباشد',
    'confirmed'  => ':attribute مطابقت ندارد',
    'max'     => [
        'string' => ':attribute حداکثر باید :max کاراکتر باشد',
        'integer' => ':attribute حداکثر باید :max عدد باشد',
    ],
    'min'     => [
        'string' => ':attribute حداکثر باید :min کاراکتر باشد',
    ],
    'digits' => ':attribute  باید :digits رقم باشد',
    'numeric' => ':attribute باید به صورت عددی باشد',


    'attributes' => [
        'email_type' => 'نوع ایمیل',
        'user'  => 'کاربر',
        'email' => 'ایمیل',
        'name' => 'نام',
        'password' => 'رمز عبور',
        'text'  => 'متن پیام کوتاه',
        'phone_number' => 'شماره همراه'
    ]
];
