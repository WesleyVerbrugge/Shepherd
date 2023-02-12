<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\ShiftResource;
use Carbon\Carbon;

class ShiftController extends Controller
{
    // Checks if office type is already filled in the request.
    private function checkRequestForOfficeType($request){
        if(!is_null($request->toArray()['in_office'])){
            $validated = $this->validateWithOfficeType($request);

        } else {
            $validated = $this->validateWithoutOfficeType($request);
        }
        return $validated;
    }

    //validates the request paramaters without checking office type.
    private function validateWithoutOfficeType($request){
        $validated = $request->validate([
            'shift_start_details' => 'required|date',
            'shift_end_details' => 'required|date',
        ]);
        $validated['in_office'] = 1;

        return $validated;
    }

    //validates the request parameters while checking office type as well.
    private function validateWithOfficeType($request){
        return $request->validate([
            'shift_start_details' => 'required|date',
            'shift_end_details' => 'required|date',
            'in_office' => 'integer|max:3'
        ]);
    }

    //Checks if the shift end is later then 18:00 on a given shift day to automatically determine the shift type.
    private function checkShiftType($requestArray){
        $shift_end = Carbon::create($requestArray['shift_end_details'])->toTimeString();
        $shift_start = Carbon::create($requestArray['shift_start_details'])->toTimeString();

        if(Carbon::parse($shift_end)->greaterThan("18:00:00")){
            $requestArray['shift_type'] = 2;
        } else if (Carbon::parse($shift_end)->greaterThan("22:00:00") || (Carbon::parse($shift_start)->greaterThan("00:00:00") && Carbon::parse($shift_start)->lessThan("08:00:00")) ) {
            $requestArray['shift_type'] = 3;
        } else {
            $requestArray['shift_type'] = 1;
        }

        return $requestArray;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allItems = Shift::paginate();
        return ShiftResource::collection($allItems);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->checkRequestForOfficeType($request);

        $validated = $this->checkShiftType($validated);

        $shift = Shift::create($validated);
        return new ShiftResource($shift);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        return new ShiftResource($shift);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        $validated = $this->checkRequestForOfficeType($request);

        $validated = $this->checkShiftType($validated);

        $shift->update($validated);
        return new ShiftResource($shift);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
