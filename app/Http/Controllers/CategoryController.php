<?php

namespace App\Http\Controllers;

use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return new ViewResponse('category.index', ['data' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return new ViewResponse('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'title' => $request->title,
            'slug' => $request->slug
        ]);
        return new RedirectResponse(route('category.index'), ['flash_success' => 'Успешно сохранено']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return new ViewResponse('category.edit', ['data' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->update();
        return new RedirectResponse(route('category.index'), ['flash_success' => 'Успешно обновлено']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Category::destroy($id)) {
            return new RedirectResponse(route('category.index'), ['flash_success' => 'Успешно удалено']);
        }

        return new RedirectResponse(route('category.index'), ['flash_error' => 'Не удалось удалить']);
    }
}
