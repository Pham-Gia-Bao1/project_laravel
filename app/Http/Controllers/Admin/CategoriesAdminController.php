<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoffeModel;
use App\Models\Cartegory;

class CategoriesAdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = Cartegory::all();
        return view('admin.category.Categories', compact('categories')); // Truyền dữ liệu categories vào view
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|max:255' // Corrected table name to 'categories'
        ], [
            'category.required' => 'The category field is required.',
            'category.max' => 'The category field must not exceed 255 characters.'
        ]);
        $category = new Cartegory(); // Assuming 'Category' is your model
        $category->name = $validated['category']; // Assign the validated category name
        $result = $category->save(); // Save the category
        if ($result) {
            return  redirect()->route('admin.categories')->with('success', 'create new category susscessful'); // Returning true or 1 might be confusing, consider returning a meaningful response
        }
        return redirect()->back()->with('error', 'create new category not susscessful');
    }

    public function update(Request $request, string $id)
    {
        $category = Cartegory::find($id);
        if (isset($request->category)) {
            if (!empty($request->category)) {
                $validated = $request->validate([
                    'category' => 'required|max:255'
                ], [
                    'category.required' => 'The category field is required.',
                    'category.max' => 'The category field must not exceed 255 characters.'
                ]);

                // Check if the category exists
                if ($category) {
                    // Update the category
                    $category->name = $validated['category'];
                    $category->save();

                    return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
                } else {
                    return redirect()->route('admin.categories')->with('error', 'Category not found.');
                }
            }
            return redirect()->back()->with('message', 'please enter a category');
        }

        return view('admin.category.UpdateCategory',compact('category'));
    }

    public function delete(Request $request){
        $category = Cartegory::find($request->id);
        if($category){
            $category->delete();
            return redirect()->route('admin.categories')->with('success', 'Category delete successfully.');
        }
        return redirect()->route('admin.categories')->with('error', 'Category not found.');
    }
}
