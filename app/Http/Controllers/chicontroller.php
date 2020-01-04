<?php

namespace App\Http\Controllers;

use App\Imports\khachhangimport;
use App\chi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class chicontroller extends Controller
{
    public function index()
    {
        $chis = chi::latest()->paginate(10);

        return view('chi.index',compact('chis'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('chi.create');
    }
    public function store(Request $request)
    {
        $request->validate([
                'loaichi' => 'required',
                'ngaychi' => 'required',
                'sotien' => 'required',
                'ghichu' => 'required',


            ]
        );

        chi::create($request->all());
        return redirect()->route('chi.index')->with('success','thêm thành công .');
    }
    public function show(chi $chi)
    {
        return view('chi.show',compact('chi'));
    }
    public function edit(chi $chi)
    {
        return view('chi.edit',compact('chi'));
    }
    public function update(Request $request, chi $chi)
    {
        $request->validate([
            'loaichi' => 'required',
            'ngaychi' => 'required',
            'sotien' => 'required',
            'ghichu' => 'required',
        ]);
        $chi->update($request->all());
        return redirect()->route('chi.index')->with('success','sửa thành công.');
    }
    public function destroy(chi $chi)
    {
        $chi->delete();
        return redirect()->route('chi.index')->with('success','xóa thành công.');
    }

}
