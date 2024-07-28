<?php

namespace App\Http\Controllers\Backend;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\StoreCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\CategoryImage;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $has_images = $request->hasFile('images');
        
        DB::beginTransaction();

        try {
            $Category = Category::create([
                'name' => $validated['name'],
            ]);

            if ($has_images) {
            $images = $request->file('images');

                // foreach ($images as $image) {
                    $file = $images->store('public/category');
    
                    CategoryImage::create([
                        'category_id' => $Category->id,
                        'image' => $file
                    ]);
                // }
            }

            DB::commit();

            return redirect()->route('admin.category.index', $Category)->withFlashSuccess(__('New Payer is Successfully Created.'));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the Category. Please try again.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit')
            ->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $has_images = $request->hasFile('images');

        DB::beginTransaction();

        try {
            $category->update([
                'name' => $validated['name'],
            ]);

            if ($has_images) {
                $images = $request->file('images');

                $current_images = $category->images;
                if($current_images) {
                    // foreach ($category->images as $image) {
                    Storage::delete($category->images->image);
                    // }
                    $category->images()->delete();
                }
    
                // foreach ($images as $image) {
                $file = $images->store('public/category');

                CategoryImage::create([
                    'category_id' => $category->id,
                    'image' => $file
                ]);
                // }
            }

            DB::commit();

            return redirect()->route('admin.category.index', $category)->withFlashSuccess(__('Payer is Successfully Updated.'));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Payer. Please try again.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        $current_images = $Category->images;
            if($current_images) {
                // foreach ($Category->images as $image) {
                    Storage::delete($current_images->image);
                // }
            }

        $Category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Payer deleted successfully');
    }
}
