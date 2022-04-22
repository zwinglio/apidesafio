<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Resources\ExerciseResource;
use App\Http\Resources\ExerciseCollection;
use App\Http\Requests\StoreExerciseRequest;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::with('serie')->orderBy('id')->paginate(10);

        return new ExerciseCollection($exercises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExerciseRequest $request)
    {
        $exercise = Exercise::create($request->all());

        return response()->json([
            'message' => 'Exercise created successfully!',
            'data' => new ExerciseResource($exercise),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        $exercise = Exercise::with('serie')->findOrFail($exercise->id);

        return new ExerciseResource($exercise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExerciseRequest $request, Exercise $exercise)
    {
        $exercise->update($request->all());

        return response()->json([
            'message' => 'Exercise updated successfully!',
            'data' => new ExerciseResource($exercise),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return response()->json([
            'message' => 'Exercise deleted successfully!',
            'data' => new ExerciseResource($exercise),
        ], 200);
    }
}
