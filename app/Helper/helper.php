<?php

use Illuminate\Support\Facades\DB;

function application()
{
    return DB::table('applications')->first();
}









