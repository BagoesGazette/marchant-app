<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Merchant\Entities\Merchant;
use Modules\Product\Entities\Product;
use Throwable;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a ajax of the resource.
     * @return Renderable
    */
    public function ajax(){
        try {
            $data = Product::with('relatedMerchant');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if($row->product_status === 'active'){
                        return '
                            <span class="badge badge-pill badge-success">'.ucwords($row->product_status).'</span>
                        ';
                    }elseif ($row->product_status === 'not-active') {
                        return '
                            <span class="badge badge-pill badge-danger">'.ucwords($row->product_status).'</span>
                        ';
                    }
                  
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '  <a href="' . route('product.edit', $row->product_id) . '" class="btn btn-warning">Edit</a>
                                    <a href="' . route('product.show', $row->product_id) . '" class="btn btn-success">Detail</a>
                                ';
                    return $actionBtn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } catch (Throwable $e) {

            return redirect()->route('home')->with(['error' => 'Ajax Failed! ' . $e->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $merchant = Merchant::all();

        return view('product::create', compact('merchant'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|unique:products',
            'merchant_id'       => 'required',
            'price'             => 'required',
            'product_status'    => 'required',
        ]);

        try{
            
            Product::create([
                'name'              => $request['name'],
                'merchant_id'       => $request['merchant_id'],
                'price'             => $request['price'],
                'product_status'    => $request['product_status'],
            ]);

            $notification = array(
                'message'   => 'Successfull create new product name '.$request->name,
                'title'     => 'Product'
            );

            return redirect()->route('product.index')->with($notification);

        } catch (Throwable $e) {

            return redirect()->route('home')->with(['error' => 'Creating Failed! ' . $e->getMessage()]);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $product    = Product::find($id);

        return view('product::show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product    = Product::find($id);
        $merchant   = Merchant::all();

        return view('product::edit', compact('product', 'merchant'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required',
            'merchant_id'       => 'required',
            'price'             => 'required',
            'product_status'    => 'required',
        ]);

        try{
            
            $product                    = Product::find($id);
            $product->name              = $request->name;
            $product->merchant_id       = $request->merchant_id;
            $product->price             = $request->price;
            $product->product_status    = $request->product_status;
            $product->save();

            $notification = array(
                'message'   => 'Successfull update product name '.$request->name,
                'title'     => 'Product'
            );

            return redirect()->route('product.index')->with($notification);

        } catch (Throwable $e) {

            return redirect()->route('home')->with(['error' => 'Update Failed! ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            Product::find($id)->delete();

            return response()->json(['status' => 'success']);
        } catch (Throwable $e) {

            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
