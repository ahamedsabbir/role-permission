<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\cms;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layouts.cms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cms $cms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cms $cms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cms $cms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cms $cms)
    {
        //
    }
}
