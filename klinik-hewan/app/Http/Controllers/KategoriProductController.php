<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduct;
use Illuminate\Http\Request;

class KategoriProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kategori_product.index');
    }

    public function data()
    {
        $kategoriProduct = KategoriProduct::orderBy('id', 'desc')->get();

        return datatables()
            ->of($kategoriProduct)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategoriProduct) {
                return '
                <div class="form group" align="center">
                    <button type="button" onclick="editForm(`' . route('kategori_products.update', $kategoriProduct->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('kategori_products.destroy', $kategoriProduct->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $kategoriProduct = KategoriProduct::create($request->all());

        if ($kategoriProduct) {
            return redirect()
                ->route('kategori_products.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
            // return response()->json(array("success" => 'New post has been created successfully'));
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
     * @param  \App\Models\KategoriProduct  $kategoriProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kategoriProduct = KategoriProduct::find($id);

        return response()->json($kategoriProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriProduct  $kategoriProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriProduct $kategoriProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriProduct  $kategoriProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kategoriProduct = KategoriProduct::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduct  $kategoriProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kategoriProduct = KategoriProduct::find($id)->delete();

        return response(null, 204);
    }
}
