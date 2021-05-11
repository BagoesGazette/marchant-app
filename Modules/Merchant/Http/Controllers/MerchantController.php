<?php

namespace Modules\Merchant\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Merchant\Entities\Merchant;
use Throwable;
use Yajra\DataTables\DataTables;

class MerchantController extends Controller
{
    /**
     * Display a ajax of the resource.
     * @return Renderable
    */
    public function ajax(){
        try {
            $data = Merchant::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '  <a href="' . route('merchant.edit', $row->merchant_id) . '" class="btn btn-warning">Edit</a>
                                    <a href="' . route('merchant.show', $row->merchant_id) . '" class="btn btn-success">Detail</a>
                                ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
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
        return view('merchant::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('merchant::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_code'  => 'required|unique:merchants',
            'merchant_name' => 'required|unique:merchants|max:255',
        ]);

        try{
            
            Merchant::create([
                'country_code'  => $request['country_code'],
                'merchant_name' => $request['merchant_name'],
            ]);

            $notification = array(
                'message'   => 'Successfull create new Merchant name '.$request->merchant_name,
                'title'     => 'Merchant'
            );

            return redirect()->route('merchant.index')->with($notification);

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
        $merchant = Merchant::find($id);

        return view('merchant::show', compact('merchant'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $merchant = Merchant::find($id);

        return view('merchant::edit', compact('merchant'));
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
            'country_code'  => 'required',
            'merchant_name' => 'required|max:255',
        ]);

        try{
            
            $merchant                   = Merchant::find($id);
            $merchant->country_code     = $request->country_code;
            $merchant->merchant_name    = $request->merchant_name;
            $merchant->save();

            $notification = array(
                'message'   => 'Successfull update Merchant name '.$request->merchant_name,
                'title'     => 'Merchant'
            );

            return redirect()->route('merchant.index')->with($notification);

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
            Merchant::find($id)->delete();

            return response()->json(['status' => 'success']);
        } catch (Throwable $e) {

            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
