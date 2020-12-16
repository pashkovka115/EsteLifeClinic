<?php

if (!function_exists('option')) {
    function option($key)
    {
        return \App\Models\Option::where('key', $key)->firstOrFail();
    }
}

if (!function_exists('options')) {
    function options(array $keys)
    {
        return \App\Models\Option::whereIn('key', $keys)->get();
    }
}
