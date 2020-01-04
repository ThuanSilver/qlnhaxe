<?php

namespace App\Http\Controllers;

use App\phukien;
use Illuminate\Http\Request;

class phukiencontroller extends Controller
{
    public function index()
    {
        $phukiens = phukien::latest()->paginate(10);

        return view('phukien.index',compact('phukiens'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('phukien.create');
    }
    public function store(Request $request)
    {
        $request->validate([
                'tenphukien' => 'required',
                'giaban' => 'required'
            ]
        );

        phukien::create($request->all());
        return redirect()->route('phukien.index')->with('success','thêm thành công .');
    }
    public function show(phukien $phukien)
    {
        return view('phukien.show',compact('phukien'));
    }
    public function edit(phukien $phukien)
    {
        return view('phukien.edit',compact('phukien'));
    }
    public function update(Request $request, phukien $phukien)
    {
        $request->validate([
            'tenphukien' => 'required',
            'giaban' => 'required',
        ]);
        $phukien->update($request->all());
        return redirect()->route('phukien.index')->with('success','sửa thành công.');
    }
    public function destroy(phukien $phukien)
    {
        $phukien->delete();
        return redirect()->route('chi.index')->with('success','xóa thành công.');
    }

}
