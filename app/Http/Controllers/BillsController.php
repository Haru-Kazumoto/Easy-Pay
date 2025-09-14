<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render("Bills/Index", [
            'title' => 'Daftar Tagihan',
            'bills' => array(),
            'breadcrumbs' => [
                [
                    'label' => 'Daftar Tagihan',
                    'href' => 'bills.index'
                ]
            ]
        ]);
    }

    public function indexOwn() 
    {
        return Inertia::render("Bills/Index", [
            'title' => 'Tagihan Saya',
            'bills' => array(),
            'breadcrumbs' => [
                [
                    'label' => 'Tagihan Saya',
                    'href' => 'bills.my-bills'
                ]
            ]
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('Bills/Show', [
            'id' => $id
        ]);
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
