<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PositionController extends Controller
{
    public function __construct(
        private Position $positionModel
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->positionModel->where('company_id', auth()->id())->get();
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
        $this->positionModel->create([
            'company_id' => auth()->id(),
            'code' => substr(Str::uuid(), 0, 4),
            'role' => $request->role,
            'description' => $request->description,
            'local' => $request->local
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        return $this->positionModel->where('code', $code)->get();
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
