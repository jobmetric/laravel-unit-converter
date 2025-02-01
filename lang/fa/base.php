<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base Unit Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during Unit for
    | various messages that we need to display to the user.
    |
    */

    "validation" => [
    ],

    "messages" => [
        "found" => "واحد یافت شد.",
        "created" => "واحد با موفقیت ایجاد شد.",
        "updated" => "واحد با موفقیت به‌روزرسانی شد.",
        "deleted" => "واحد با موفقیت حذف شد.",
        "change_default_value" => "مقدار پیش‌فرض با موفقیت تغییر کرد.",
        "used_in" => "واحد در ':count' مکان استفاده شده است.",
        "attached" => "واحد با موفقیت متصل شد.",
        "detached" => "واحد با موفقیت جدا شد.",
    ],

    "exceptions" => [
        "model_unit_contract_not_found" => "مدل ':model' اینترفیس 'JobMetric\Unit\Contracts\UnitContract' را پیاده‌سازی نکرده است!",
        "unit_not_found" => "واحد ':number' یافت نشد!",
        "type_not_found_in_allow_types" => "نوع ':type' در انواع مجاز یافت نشد!",
        "unit_type_default_value" => "واحد مورد نظر ':unit' باید در مرحله اول مقدار پیش‌فرض 1 داشته باشد و شما نمی‌توانید مقدار دیگری وارد کنید.",
        "unit_type_use_default_value" => "شما قبلاً مقدار پیش‌فرض را وارد کرده‌اید و دیگر نمی‌توانید از مقدار 1 استفاده کنید.",
        "unit_type_cannot_change_default_value" => "شما نمی‌توانید مقدار پیش‌فرض را تغییر دهید.",
        "unit_type_not_in_unit_allow_types" => "نوع واحد ':type' در انواع مجاز واحد وجود ندارد!",
        "unit_type_used_in" => "واحد شماره ':unit_id' در ':number' مکان استفاده شده است!",
        "cannot_delete_default_value" => "شما نمی‌توانید مقدار پیش‌فرض را حذف کنید تا زمانی که موارد دیگر حذف شوند!",
        "from_and_to_must_same_type" => "مبدا و مقصد تبدیل باید از یک نوع باشند!",
    ],

    "fields" => [
        "weight" => "وزن",
        "length" => "طول",
        "currency" => "ارز",
        "number" => "عدد",
        "crypto" => "ارز دیجیتال",
        "volume" => "حجم",
        "temperature" => "دما",
        "area" => "مساحت",
        "pressure" => "فشار",
        "speed" => "سرعت",
        "force" => "نیرو",
        "time" => "زمان",
        "torque" => "گشتاور",
        "energy" => "انرژی",
        "frequency" => "فرکانس",
        "power" => "توان",
        "acceleration" => "شتاب",
        "data_transfer" => "انتقال داده",
        "data_storage" => "ذخیره‌سازی داده",
        "angle" => "زاویه",
        "density" => "چگالی",
        "mass_flow" => "جریان جرمی",
        "volumetric_flow" => "جریان حجمی",
        "electric_current" => "جریان الکتریکی",
        "heat_transfer_coefficient" => "ضریب انتقال حرارت",
    ],

    "field_name" => "واحد :field",
    "field_enter" => "وارد کردن :field",
    "field_select" => "انتخاب یک :field",

];
