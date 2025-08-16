<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
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
        $category = Category::orderBy('created_at', 'desc')->get();
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $returnView = view('category.modal-add')->render();
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
                return redirect()->back()->withErrors($errors)->with('errorValidation', 'Failed to Add Data');
            } else {
                Category::create([
                    'name'  => $request->name,
                ]);
                DB::commit();
                return redirect()->back()->with('status', 'Successfully added data');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('status', 'Failed to Add Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::findorfail($id);
        $returnView = view('category.modal-edit', compact('data'))->render();
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
                return redirect()->back()->withErrors($errors)->with('errorValidation', 'Failed to update Data');
            } else {
                $category = Category::findorfail($id);
                $category_data = [
                    'name'  => $request->name,
                ];
                $category->update($category_data);
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
        $category = Category::findorfail($id);
        $category->delete();
        return redirect()->back()->with('status', 'Successfully deleted data');
    }
}
