<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
        ]);

        $slugInput = $request->filled('slug') ? $request->slug : $request->name;
        $slug = $this->makeUniqueSlug(Str::slug($slugInput));

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('dashboard.categories')->with('success', 'Category created!');
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
        ]);

        $slugInput = $request->filled('slug') ? $request->slug : $request->name;
        $slug = Str::slug($slugInput);

        if ($category->slug !== $slug) {
            $slug = $this->makeUniqueSlug($slug, $category->id);
        }

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('dashboard.categories')->with('success', 'Category updated!');
    }


    function viewCategories()
    {
        $categories = Category::withCount('posts')->get();
        return view("dashboard.categories", compact('categories'));
    }



    function makeUniqueSlug($baseSlug, $exceptId = null)
    {
        $slug = $baseSlug;
        $i = 1;

        while (
            Category::where('slug', $slug)
            ->when($exceptId, fn($q) => $q->where('id', '!=', $exceptId))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $i++;
        }

        return $slug;
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard.categories')->with('success', 'Category deleted!');
    }
}
