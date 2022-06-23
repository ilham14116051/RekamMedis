<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduct;
use App\Models\KelasProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategoriProduct = KategoriProduct::all();
        $kelasProduct = KelasProduct::all();

        return view('product.index', compact('kategoriProduct', 'kelasProduct'));
    }

    public function data()
    {
        $product = Product::orderBy('id', 'desc')->get();

        return datatables()
            ->of($product)
            ->addIndexColumn()
            ->addColumn('kategori_product_id', function ($product) {
                return $product->kategori_product->kd_kategori_product;
            })
            ->addColumn('kelas_product_id', function ($product) {
                return $product->kelas_product->kd_kelas_product;
            })
            ->addColumn('purchase_price', function ($product) {
                return currency_IDR($product->purchase_price);
            })
            ->addColumn('sale_price', function ($product) {
                return currency_IDR($product->sale_price);
            })
            ->addColumn('stock', function ($product) {
                return format_number($product->stock);
            })
            ->addColumn('aksi', function ($product) {
                return '
                <div class="form group" align="center">
                    <button type="button" onclick="editForm(`' . route('products.update', $product->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('products.destroy', $product->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $product = Product::create($request->all());
        if ($product) {
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
        $product = Product::find($id);

        return response()->json($product);
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
        $product = Product::find($id)->update($request->all());

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
        $product = Product::find($id)->delete();

        return response(null, 204);
    }
}
