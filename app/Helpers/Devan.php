<?php


if (!function_exists('get_code_group')) {
    function get_code_group($code)
    {
        return \App\Models\ComCode::where('code_group', $code)->pluck('code_nm', 'code_cd');
    }
}


if (!function_exists('get_code_role')) {
    function get_code_role($code)
    {

        return \App\Models\ComCode::wherenotin('code_cd',['ROLE_ST_01'])->pluck('code_nm', 'code_cd');
    }
}

