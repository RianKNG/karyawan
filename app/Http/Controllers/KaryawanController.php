<?php

namespace App\Http\Controllers;



use PDF;
use App\Models\Karyawan;
use App\Models\Religion;
use Illuminate\Http\Request;
use App\Exports\KaryawanExport;
use App\Imports\KaryawanImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;



class KaryawanController extends Controller
{
  public function index(Request $request){
      if ($request->has('cari')) {
          $data = Karyawan::where('nama','LIKE','%'.$request->cari.'%')->paginate(10);
      } else {
        $data = Karyawan::paginate(10);
        // dd($data);
      }
      return view ('datakaryawan', compact('data'));
  }
  public function tambahdata(){
      $dataagama = Religion::all();
      // dd($data);
      return view('tambahdata',compact('dataagama'));
  }
  public function masukandata(Request $request){
      
      //form validation
    $this->validate($request,[
        'notlp' => 'required|min:11|max:13',
    ]);

   $data = Karyawan::create($request->all());
      if($request->hasFile('foto')){
          $request->file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
          $data->foto = $request->file('foto')->getClientOriginalName();
          $data->save();
   
      }
      return redirect()->route('karyawan')->with('success','data berhasil ditambahkan');
    
  }
  public function editdata($id){
      $data = Karyawan::find($id);
      return view ('editupdatedata', compact('data'));
  }
  public function updatedata(Request $request, $id){
      $data = Karyawan::find($id);
      $data->update($request->all());

        if($request->hasFile('foto')){
          $request->file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
          $data->foto = $request->file('foto')->getClientOriginalName();
          $data->save();
      }
      

      return redirect()->route('karyawan')->with('success','data berhasil diupdate');
  }
  public function hapusdata($id){
      $data = Karyawan::find($id);
      $data->delete();
      return redirect()->route('karyawan')->with('success','data berhasil dihapus');
  }
  public function exportpdf(){
      $data = Karyawan::all();
      view()->share('data', $data);
      $pdf = PDF::loadview('datakaryawan-pdf');
      return $pdf->download('data.karyawan-pdf');
  }
  public function exportexel(){
      return Excel::download(new KaryawanExport, 'datakaryawan.xlsx');
  }
  public function importexel(Request $request){
      $data = $request->file('file');

      $namafile = $data->getClientOriginalName();
      $data->move('fotokaryawan', $namafile);
      
      Excel::import(new KaryawanImport, \public_path('/datakaryawan/'.$namafile));
      return \redirect()->back();

  }
  public function logout(){
      Auth::logout();
      return redirect('/login');
  }
}
