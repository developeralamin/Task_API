<?php

namespace App\Repository;

use App\Models\Lesson;

class LessonRepository
{
    /**
     * All Lesson
     */
    public function allData()
    {
        return Lesson::all();
    }
    /**
     * Create lesson
     */
    public function create($data)
    {
        return Lesson::create($data);
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     */
    public function findOrFail($id)
    {
        return Lesson::findOrFail($id);
    }
    /**
     * Update a Lesson Information
     *
     * @param int   $id
     *
     * @param array $data
     */
    public function update($id, $data)
    {
        $lesson = $this->findOrFail($id);

        return $lesson->update($data);
    }
}
