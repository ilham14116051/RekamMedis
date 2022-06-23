<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pasien = Pasien::all();
        $now = Carbon::now();
        $dateNow = $now->year . $now->month . $now->day;
        $cek = RekamMedis::count();
        if ($cek == 0) {
            $urut = 10001;
            $nomer = 'RM-' . $dateNow . $urut;
        } else {
            $ambil = RekamMedis::all()->last();
            $urut = (int)substr($ambil->no_rm, -5) + 1;
            $nomer = 'RM-' . $dateNow . $urut;
        }



        return view('rekam_medis.index', compact('pasien', 'nomer'));
        // return view('rekam_medis.ringgo', compact('pasien', 'nomer'));
    }

    public function data()
    {
        $rekamMedis = RekamMedis::orderBy('id', 'desc')->get();

        return datatables()
            ->of($rekamMedis)
            ->addIndexColumn()
            ->addColumn('pasien_id', function ($rekamMedis) {
                return $rekamMedis->pasien->nm_hewan;
            })
            ->addColumn('aksi', function ($rekamMedis) {
                return '
                <div class="form group" align="center">
                    <button type="button" onclick="editForm(`' . route('rekam_medis.update', $rekamMedis->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('rekam_medis.destroy', $rekamMedis->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                    <form method="get" action="/rekam_medis/pdf/'. $rekamMedis->id .'">
                    <button type="submit"  class="btn btn-xs btn-success btn-flat">Cetak</button>
                    </form>
                </div>
                ';
                
            })
            ->rawColumns(['aksi'])
            ->make(true);
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
        //
        $rekamMedis = RekamMedis::create($request->all());
        if ($rekamMedis) {
            // return redirect()
            //     ->route('kelas_products.index')
            //     ->with([
            //         'success' => 'New post has been created successfully'
            //     ]);
            return response()->json(array("success" => 'New post has been created successfully'));
        } else {
            // return redirect()
            //     ->back()
            //     ->withInput()
            //     ->with([
            //         'error' => 'Some problem occurred, please try again'
            //     ]);
            return response()->json(array("error" => 'Some problem occurred, please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rekamMedis = RekamMedis::find($id);

        return response()->json($rekamMedis);
    }

    public function pdf($id){

        $data = RekamMedis::find($id);
        $pasien = Pasien::find($id);
    
        $pdf = PDF::loadView('pdf.rekam_medis_pdf', compact('data','pasien'));
        return $pdf->setPaper('a4', 'landscape')->stream('Rekam Medis - ' . $data->no_rm . '.pdf');
        // return $pdf->setPaper('a4', 'landscape')->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rekamMedis = RekamMedis::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rekamMedis = RekamMedis::find($id)->delete();

        return response(null, 204);
    }
}
