<?php

namespace App\Http\Controllers;
use App\kho;
use App\khophukien;
use  App\banphukien;
use Illuminate\Http\Request;

class khophukiencontroller extends Controller
{
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('auth');
    }
=======
>>>>>>> c37523de6264fb2cc904a426aaf25d10f2cfc900
    public function index()
    {
        $khophukiens = khophukien::latest()->paginate(10);

        return view('khophukien.index',compact('khophukiens'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $banphukiens=banphukien::all();
        return view('khophukien.create',compact('banphukiens'));
    }
    public function store(Request $request)
    {
        $request->validate([
                'tenkho' => 'required',
                'dia_diem' => 'required',
                'soluongton' => 'required',
                'nhap' => 'required',
                'ngaynhap' => 'required',
                'conlai' => 'required',
                'banphukien_id' => 'required',
            ]
        );
        khophukien::create($request->all());
        return redirect()->route('khophukien.index')->with('success','thêm thành công .');
    }

    public function edit(khophukien $khophukien)
    {
        $banphukiens=banphukien::all();
        return view('khophukien.edit',compact('banphukiens','khophukien'));
    }
    public function update(Request $request, khophukien $khophukien)
    {
        $request->validate([
            'tenkho' => 'required',
            'dia_diem' => 'required',
            'soluongton' => 'required',
            'nhap' => 'required',
            'ngaynhap' => 'required',
            'conlai' => 'required',
            'banphukien_id' => 'required',
        ]);
        $khophukien->update($request->all());
        return redirect()->route('khophukien.index')->with('success','sửa thành công.');
    }
    public function destroy(khophukien $khophukien)
    {
        $khophukien->delete();
        return redirect()->route('khophukien.index')->with('success','xóa thành công.');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> c37523de6264fb2cc904a426aaf25d10f2cfc900
