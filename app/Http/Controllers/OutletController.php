<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OutletController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware(function ($request, $next) {
    //         if (Auth::user()->level == 'admin') {
    //             return $next($request);
    //         }
    //         return Redirect::route('login');
    //     });
    // }

    public function index()
    {
        $outlet = Outlet::orderBy('created_at', 'desc')->get();
        return view('outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $returnView = view('outlet.modal-add')->render();
        return response()->json([
            'success' => true,
            'html' => $returnView
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors)->with('errorValidation', 'Tidak Berhasil Menambah Data');
            } else {
                Outlet::create([
                    'name'  => $request->name,
                ]);
                DB::commit();
                return redirect()->back()->with('status', 'Berhasil menambah Data');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('status', 'Tidak Berhasil menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Outlet::findorfail($id);
        $returnView = view('outlet.modal-edit', compact('data'))->render();
        return response()->json([
            'success' => true,
            'html' => $returnView
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors)->with('errorValidation', 'Tidak Berhasil Memperbarui Data');
            } else {
                $outlet = Outlet::findorfail($id);
                $outlet_data = [
                    'name'  => $request->name,
                ];
                $outlet->update($outlet_data);
                DB::commit();
                return redirect()->back()->with('status', 'Berhasil memperbarui Data');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('status', 'Tidak Berhasil memperbarui Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outlet = Outlet::findorfail($id);
        $outlet->delete();
        return redirect()->back()->with('status', 'Berhasil menghapus data');
    }
}
