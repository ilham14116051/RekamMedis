<?php

namespace App\Http\Controllers;

use App\Models\KelasProduct;
use Illuminate\Http\Request;

class KelasProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kelas_product.index');
    }

    public function data()
    {
        $kelasProduct = KelasProduct::orderBy('id', 'desc')->get();

        return datatables()
            ->of($kelasProduct)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kelasProduct) {
                return '
                <div class="form group" align="center">
                    <button type="button" onclick="editForm(`' . route('kelas_products.update', $kelasProduct->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('kelas_products.destroy', $kelasProduct->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $kelasProduct = KelasProduct::create($request->all());

        if ($kelasProduct) {
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
        $kelasProduct = KelasProduct::find($id);

        return response()->json($kelasProduct);
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
        $kelasProduct = KelasProduct::find($id)->update($request->all());

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
        $kelasProduct = KelasProduct::find($id)->delete();

        return response(null, 204);
    }
}
