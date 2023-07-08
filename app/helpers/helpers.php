<?php
// namespace App\helpers;


if (!function_exists('generateAccountReference')) {
    function generateAccountReference()
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1, 20))), 1, 20);
    }
}

if (!function_exists('generateTransactionReference')) {
    function generateTransactionReference()
    {
        return "WBA" . mt_rand(10000000000, 99999999999);
    }
}

if (!function_exists('user_email')) {
    function user_email()
    {
        $user = Auth::user();
        return $user->email;
    }
}

function generateAccountNumber()
{
    return mt_rand(1000000000, 9999999999);
}

function moneyFormat($value)
{

    return number_format($value, 2);
}

function moneyFormater($value)
{

    return bcadd($value, '0', 2);
}
function setTitle($menu)
{

    return ucwords(str_replace('_', ' ', $menu));
}
function removeMinusText($menu)
{

    return ucwords(str_replace('-', ' ', $menu));
}


function logInfo($content, $title = "No Title")
{
    Log::info("<<<<<<<<<<<<<");
    Log::info($title);
    Log::info(">>>>>>>>>>>>>>>>>>>>>>");
    Log::info($content);
}
