<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Gender;
use App\Models\Religion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $religions = Religion::all();
        $genders = Gender::all();
        return view('pages.employee.index', compact('employees', 'religions', 'genders'));
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
        $data = $request->all();
        $data['tanggal_lahir'] = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');

        Employee::create($data);

        return redirect()->back()->with('success', 'Data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Employee::find($id);
        $religions = Religion::all();
        $genders = Gender::all();
        return view('pages.employee.edit', compact('item', 'religions', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['tanggal_lahir'] = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');

        $item = Employee::find($id);
        $item->update($data);

        return redirect()->route('employee.index')->with('success', 'Data telah diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Employee::find($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data telah dihapus');
    }
}
