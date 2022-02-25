<?php

namespace Azuriom\Plugin\Changelog\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Changelog\Models\Category;
use Azuriom\Plugin\Changelog\Models\Update;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::enabled()->first();

        if ($category === null) {
            return view('changelog::index');
        }

        return $this->showCategory();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Azuriom\Plugin\Changelog\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        foreach ($category->updates as $update) {
            $update->setRelation('category', $category);
        }

        return $this->showCategory($category);
    }

    protected function showCategory(Category $category = null)
    {
        $categories = Category::enabled()->withCount('updates')->get();

        return view('changelog::show', [
            'category' => $category,
            'updates' => $category !== null ? $category->updates : Update::all(),
            'categories' => $categories,
            'totalUpdates' => Update::count(),
        ]);
    }
}
