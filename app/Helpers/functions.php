<?php
//My helper functions for application !

function get_active_page($routeName = '', $className = 'active')
{
    return (route($routeName) == url()->current()) ? $className : "";
}
function get_validation_messages($more_validation = [])
{
    $messages = [
        "*.required" => "فیلد ضروری",
        "*.numeric" => "این فیلد باید عددی وارد شود(کیبورد انگلیسی)",
        "*.digits_between" => "تعداد ارقام وارد شده معتبر نیست.",
        "*.max" => "تعداد کاراکتر های وارد شده زیاد است.",
        "*.string" => "فیلد را صحیح وارد کنید.",
        "*.regex" => "فرمت وارد شده برای این فیلد صحیح نیست.",
        "*.unique" => "این مقدار قبلا در سیستم ثبت شده است، مقدار دیگری وارد کنید.",
        "*.email" => "ایمیل وارد شده صحیح نیست.",
        "*.in" => "مقدار وارد شده این فیلد در مقادیر پیش فرض وجود ندارد.",
        "*.mimes" => "فایل آپلود شده معتبر نیست.",
        "*.required_if" => "این فیلد با توجه شیوه اطلاع رسانی انتخابی شما، ضروری است.",
        "*.min" => "تعداد کاراکتر های را کم وارد کرده اید.",
        "*.confirmed" => "تکرار رمز عبور را اشتباه وارد کرده اید."
    ];
    return array_merge($messages, $more_validation);
}
function get_medias_model($model = "", $id = 0)
{
    $Model = ("App\\Models\\$model")::find($id);
    return  $Model->getMedia('images');
}
