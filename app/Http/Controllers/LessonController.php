<?php

namespace App\Http\Controllers;

use App\Repository\LessonRepository;
use App\Http\Resources\LessonResource;
use App\Http\Requests\LessonStoreRequest;

class LessonController extends Controller
{
    /**
     * Inject class in __Construct
     *
     * @var [$lesson]
     */
    private $lesson;

    public function __construct(LessonRepository $lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lesson = $this->lesson->allData();
        return LessonResource::collection($lesson);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonStoreRequest $request)
    {
        $data     = $request->all();
        $lesson = $this->lesson->create($data);

        return new LessonResource($lesson);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lesson = $this->lesson->findOrFail($id);

        return new LessonResource($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonStoreRequest $request, $id)
    {
        $data = $request->all();
        $this->lesson->update($id, $data);

        return $this->success('Lesson Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lesson = $this->lesson->findOrFail($id);
        $lesson->delete();

        return new LessonResource($lesson);
    }
}
