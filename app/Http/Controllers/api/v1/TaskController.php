<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use App\Models\task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return task::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaskRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoretaskRequest $request)
    {
        $task = task::create($request->all()) ;
        return response()->json([
           "staus" => true,
           "message" =>  "success",
           'task' => $task
        ] , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        return $task;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetaskRequest  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatetaskRequest $request, task $task)
    {
        $task->update($request->all());
        return response()->json([
            "staus" => true,
            "message" =>  "success",
            'task' => $task
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(task $task)
    {
        $task-> delete();

        return response()->json([
            "staus" => true,
            "message" =>  "success",
            'task' => $task
        ] , 200);

    }
}
