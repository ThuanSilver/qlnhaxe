<?php

namespace App\Http\Controllers;
use App\khachhang;
use  App\nhanvien;
use  App\banxe;
use  App\quatang;
use App\tragop;
use App\kho;
use App\thongtinxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class banxecontroller extends Controller
{
    public function index()
    {
        $banxes = banxe::latest()->paginate(10);

        return view('banxe.index',compact('banxes'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

      public function search(Request $request)
        {
           $cities = khachhang::where('sdt', 'LIKE', '%'.$request->input('term', '').'%')
               ->get(['id', 'sdt as text']);
           return ['results' => $cities];
     }
    public function searchSokhung(Request $request)
    {
        $cities = thongtinxe::where('sokhung', 'LIKE', '%'.$request->input('term', '').'%')
            ->get(['id', 'sokhung as text']);
        return ['results' => $cities];
    }



    public function create()
    {

        $khachhangs=khachhang::all();
        $nhanviens= nhanvien::all();
        $quatangs = quatang::all();
        $tragops = tragop::all();
        $khos = kho::all();
        $thongtinxes=  thongtinxe::all();

        return view('banxe.create',compact('khos','thongtinxes','tragops','quatangs','nhanviens','khachhangs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tongthu' => 'required',
            'sohd' => 'required',
            'giaban' => 'required',
            'duatruoc' => 'required',
            'conlai' => 'required',
            'tinhtrang' => 'required',
            'khachhang_id' => 'required',
            'ngaymua' => 'required',
            'baohiem' => 'required',
            'uyquyen' => 'required',
            'lamvang' => 'required',
            'muabh' => 'required',
            'aomua' => 'required',
            'mockhoa' => 'required',
            'aotrumxe' => 'required',
            'balo' => 'required',
            'tiengop' => 'required',
            'thongtinxe_id' => 'required',
            'kho_id' => 'required',
            'tragop_id' => 'required',
            'nhanvien_id' => 'required',

        ]);

        banxe::create($request->all());
        return redirect()->route('banxe.index')->with('success','thêm thành công .');
    }
    public function show($id)
    {
        $banxe=banxe::find($id);
        return view('banxe.xuathdbanle',compact('banxe'));
    }
    public function edit(banxe $banxe)
    {
        $khachhangs=khachhang::all();
        $nhanviens= nhanvien::all();
        $quatangs = quatang::all();
        $tragops = tragop::all();
        $khos = kho::all();
        $thongtinxes=thongtinxe::all();
        return view('banxe.edit',compact('banxe','khos','thongtinxes','nhanviens','tragops','quatangs','khachhangs'));
    }
    public function update(Request $request, banxe $banxe)
    {
        $request->validate([
            'tongthu' => 'required',
            'sohd' => 'required',
            'giaban' => 'required',
            'duatruoc' => 'required',
            'conlai' => 'required',
            'tinhtrang' => 'required',
            'khachhang_id' => 'required',
            'ngaymua' => 'required',
            'baohiem' => 'required',
            'uyquyen' => 'required',
            'lamvang' => 'required',
            'muabh' => 'required',
            'aomua' => 'required',
            'mockhoa' => 'required',
            'aotrumxe' => 'required',
            'balo' => 'required',
            'tiengop' => 'required',
            'thongtinxe_id' => 'required',
            'kho_id' => 'required',
            'tragop_id' => 'required',
            'nhanvien_id' => 'required',
        ]);
        $banxe->update($request->all());
        return redirect()->route('banxe.index')->with('success','sửa thành công.');
    }
    public function destroy(banxe $banxe)
    {
        $banxe->delete();
        return redirect()->route('banxe.index')->with('success','xóa thành công.');
    }
    public function changeStatus1(Request $request)
    {
        $banxe= banxe::find($request->id);
        $banxe->status = $request->status;
        $banxe->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
