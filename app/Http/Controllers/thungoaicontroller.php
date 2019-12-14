<?php

namespace App\Http\Controllers;

use App\thungoai;
use Illuminate\Http\Request;

class thungoaicontroller extends Controller
{
    public function index()
    {
        $thungoais = thungoai::latest()->paginate(10);

        return view('thungoai.index',compact('thungoais'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('thungoai.create');
    }
    public function store(Request $request)
    {
        $request->validate([
                'ngaythu' => 'required',
                'loaithu' => 'required',
                'tienthu' => 'required',
                'ghichu' => 'required',
            ]
        );
        thungoai::create($request->all());
        return redirect()->route('thungoai.index')->with('success','thêm thành công .');
    }

    public function edit(thungoai $thungoai)
    {
        return view('thungoai.edit',compact('thungoai'));
    }
    public function update(Request $request, thungoai $thungoai)
    {
        $request->validate([
            'ngaythu' => 'required',
            'loaithu' => 'required',
            'tienthu' => 'required',
            'ghichu' => 'required',
        ]);
        $thungoai->update($request->all());
        return redirect()->route('thungoai.index')->with('success','sửa thành công.');
    }
    public function destroy(thungoai $thungoai)
    {
        $thungoai->delete();
        return redirect()->route('thungoai.index')->with('success','xóa thành công.');
    }

}
