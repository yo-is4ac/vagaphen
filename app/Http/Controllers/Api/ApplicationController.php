<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Position;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct(
        private Application $applicationModel,
        private Position $positionModel
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(
    )
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('resume')->store('resumes');
        $positionId = $this->positionModel->where('code', $request->code)->first()->id;

        $this->applicationModel->create([
            'position_id' => $positionId,
            'resume_path' => $path,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        return $this->positionModel->where('code', $code)->first()->applications;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
