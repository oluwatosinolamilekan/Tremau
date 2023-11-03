<?php

namespace App\Action\Case;

use Exception;
use App\Models\Cases;
class DeleteCaseAction
{
    public function run($id)
    {
        $case = Cases::find($id);
        if(!$case){
            throw new Exception('Case not found');
        }
        $case->delete();

        return $case;
    }
}
