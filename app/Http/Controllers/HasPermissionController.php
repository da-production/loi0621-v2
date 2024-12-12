<?php

namespace App\Http\Controllers;

use App\Models\HasPermission;
use App\Http\Requests\StoreHasPermissionRequest;
use App\Http\Requests\UpdateHasPermissionRequest;

class HasPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHasPermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHasPermissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasPermission  $hasPermission
     * @return \Illuminate\Http\Response
     */
    public function show(HasPermission $hasPermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasPermission  $hasPermission
     * @return \Illuminate\Http\Response
     */
    public function edit(HasPermission $hasPermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHasPermissionRequest  $request
     * @param  \App\Models\HasPermission  $hasPermission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHasPermissionRequest $request, HasPermission $hasPermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasPermission  $hasPermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasPermission $hasPermission)
    {
        //
    }
}
