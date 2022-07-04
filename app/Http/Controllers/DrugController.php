<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use App\Models\Drug;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function getDrugs()
    {
        $search = request('search');
        $drugs = Drug::query()->when(
            $search,
            fn ($query) =>
            $query->where('name', 'ilike', '%' . $search . '%')->orWhere('brand', 'ilike', '%' . $search . '%'),
        );
        return $drugs->latest()->paginate();
    }

    public function index()
    {

        return view('drugs.index', ['drugs' => $this->getDrugs(), 'mode' => 'create', 'drug' => new Drug()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDrugRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrugRequest $request)
    {
        Drug::create($request->only(['name', 'brand', 'size']));
        return redirect(route('drugs.index'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug)
    {
        return view('drugs.index', ['drugs' => $this->getDrugs(), 'mode' => 'edit', 'drug' => $drug]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDrugRequest  $request
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDrugRequest $request, Drug $drug)
    {
        $drug->update($request->only(['name', 'brand', 'size']));
        return redirect(route('drugs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        if ($drug->medications()->exists()) {
            return redirect(route('drugs.index'))->with('delete-message', "unable to delete drug with id $drug->id because the drug is related to a certain medication");
        }
        $drug->delete();
        return redirect(route('drugs.index'));
    }
}
