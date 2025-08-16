<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
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
        $product = Product::orderBy('created_at', 'desc')->get();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $returnView = view('product.modal-add', compact('category'))->render();
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
                'category' => 'required',
                'harga_jual' => 'required|numeric',
                'harga_modal' => 'required|numeric',
                'stok' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors)->with('errorValidation', 'Failed to Add Data');
            } else {
                if ($request->has('image')) {
                    $imagePath = $request->file('image')->store('product', 'public');
                } else {
                    $imagePath = null;
                }
                Product::create([
                    'outlet_id' => $request->Session()->get('outlet_id'),
                    'category_id'  => $request->category,
                    'name'  => $request->name,
                    'sale_price'  => $request->harga_jual,
                    'cost_price'  => $request->harga_modal,
                    'stock' => $request->stok,
                    'description' =>  $request->deskripsi,
                    'image_path' => $imagePath,
                ]);
                DB::commit();
                return redirect()->back()->with('status', 'Successfully added data');
            }
        } catch (\Exception $e) {
            return $e;
            DB::rollBack();
            return redirect()->back()->with('status', 'Failed to Add Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::findorfail($id);
        $category = Category::all();
        $returnView = view('product.modal-edit', compact('data', 'category'))->render();
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
                'category' => 'required',
                'harga_jual' => 'required|numeric',
                'harga_modal' => 'required|numeric',
                'stok' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors)->with('errorValidation', 'Failed to update Data');
            } else {
                if ($request->has('image')) {
                    $imagePath = $request->file('image')->store('product', 'public');
                } else {
                    $imagePath = null;
                }
                $product = Product::findOrFail($id);
                $product->update([
                    'category_id'  => $request->category,
                    'name'  => $request->name,
                    'sale_price'  => $request->harga_jual,
                    'cost_price'  => $request->harga_modal,
                    'stock' => $request->stok,
                    'description' =>  $request->deskripsi,
                    'image_path' => $imagePath,
                ]);
                DB::commit();
                return redirect()->back()->with('status', 'Successfully updated data');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('status', 'Failed to update Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorfail($id);
        $product->delete();
        return redirect()->back()->with('status', 'Successfully deleted data');
    }
}
