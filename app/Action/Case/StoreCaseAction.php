<?php

namespace App\Action\Case;


use App\Models\Cases;
class StoreCaseAction
{
    public function run($data)
    {
        $case = new Cases;
        $case->reporterName = $data['reporterName'];
        $case->reporterAge = $data['reporterAge'];
        $case->reportedUrl = $data['reportedUrl'];
        $case->reporterEmail = $data['reporterEmail'];
        $case->save();

    }
}
