<?php

namespace App\Http\Controllers;

use App\Models\PulangPaksa;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class PulangPaksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rekamMedis = RekamMedis::all();
        return view('pulang_paksa.index', compact('rekamMedis'));
    }

    public function data()
    {
        $pulangPaksa = PulangPaksa::orderBy('id', 'desc')->get();

        return datatables()
            ->of($pulangPaksa)
            ->addIndexColumn()
            ->addColumn('rekam_medis_id', function ($pulangPaksa) {
                return $pulangPaksa->rekam_medis->no_rm . ' || ' . $pulangPaksa->rekam_medis->pasien->nm_hewan;
            })
            ->addColumn('aksi', function ($pulangPaksa) {
                return '
                <div class="form group" align="center">
                    <button type="button" onclick="editForm(`' . route('pulang_paksas.update', $pulangPaksa->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('pulang_paksas.destroy', $pulangPaksa->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $pulangPaksa = PulangPaksa::create($request->all());
        if ($pulangPaksa) {
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
        $pulangPaksa = PulangPaksa::find($id);

        return response()->json($pulangPaksa);
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
        $pulangPaksa = PulangPaksa::find($id)->update($request->all());

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
        $pulangPaksa = PulangPaksa::find($id)->delete();

        return response(null, 204);
    }
}
