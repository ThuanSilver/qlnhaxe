<?php

namespace App\Http\Controllers;

use App\Imports\khachhangimport;
use App\Imports\khoimport;
use  App\kho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class khocontroller extends Controller
{
    public function index()
    {
        $khos = kho::latest()->paginate(10);

        return view('kho.index',compact('khos'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('kho.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'dia_diem' => 'required',
            'name' => 'required',

        ]);
        kho::create($request->all());
        return redirect()->route('kho.index')->with('success','thêm thành công .');
    }
    public function show(kho $kho)
    {
        return view('kho.show',compact('kho'));
    }
    public function edit(kho $kho)
    {
        return view('kho.edit',compact('kho'));
    }
    public function update(Request $request, kho $kho)
    {
        $request->validate([
            'dia_diem' => 'required',
            'name' => 'required',
        ]);
        $kho->update($request->all());
        return redirect()->route('kho.index')->with('success','sửa thành công.');
    }
    public function destroy(kho $kho)
    {
        $kho->delete();
        return redirect()->route('kho.index')->with('success','xóa thành công.');
    }
    public function import()
    {
        Excel::import(new khoimport() ,request()->file('file'));
        return back();
    }
}
