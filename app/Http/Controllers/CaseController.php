<?php

namespace App\Http\Controllers;

use Exception;
use ListCasesAction;
use App\Models\Cases;
use App\Jobs\StoreCaseJob;
use Illuminate\Http\Request;
use App\Http\Resources\CasesResource;
use App\Http\Requests\StoreCaseRequest;

class CaseController extends Controller
{

    public function index()
    {
        try{
            $cases = (new ListCasesAction())->run();
            return CasesResource::collection($cases);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
          }
    }


    public function store(StoreCaseRequest $request)
    {
        try{
            $request->validated();

            StoreCaseJob::dispatch($request->all());

            return response()->json(['message' => 'Case created successfully'], 201);
        }catch(Exception $e){

          return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {

        try{
            $case = (new DeleteCaseAction())->run($id);
            return response()->json(['message' => 'Case deleted successfully'], 200);
        }catch(Exception $e){
          return response()->json(['error' => $e->getMessage()]);
        }

    }
}
