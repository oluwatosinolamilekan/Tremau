<?php


use App\Models\Cases;

class ListCasesAction
{
    public function run()
    {
        $cases = Cases::paginate(20);
        return $cases;
    }
}
