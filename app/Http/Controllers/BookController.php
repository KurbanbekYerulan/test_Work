<?php

namespace App\Http\Controllers;

use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return new ViewResponse('book.index', ['data' => $books]);
    }


    public function create(Request $request)
    {
        $book = new Book();
        $category = Category::all()->toArray();
        $book->category = $category;
        return new ViewResponse('book.create', ['data' => $book]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $path = public_path('books/');
        !is_dir($path) && mkdir($path, 0777, true);
        $imageName = time() . '.' . $request->cover->extension();
        $request->cover->move($path, $imageName);
        $title = '';
        $title = $request->title;
        $slug = '';
        $slug = $request->slug;
        $author = '';
        $author = $request->author;
        $description = '';
        $description = $request->description;
        $rating = '';
        $rating = $request->rating;

        $book = Book::create([
            'title' => $title,
            'slug' => $slug,
            'author' => $author,
            'description' => $description,
            'rating' => $rating,
            'cover' => $imageName,
            'category_id' => $request->category_id
        ]);

        if ($book->id) {
            return new RedirectResponse(route('book.index'), ['flash_success' => 'Успешно сохранено']);
        }

        return new RedirectResponse(route('book.index'), ['flash_error' => 'Не удалось сохранить']);
    }


    public function edit($id)
    {
        $book = Book::find($id);
        $category = Category::all()->toArray();
        $book->category = $category;
        return new ViewResponse('book.edit', ['data' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->slug = $request->slug;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->rating = $request->rating;
        $book->category_id = $request->category_id;
        if (!empty($request->cover)) {
            $image_path = app_path("books/{$book->cover}");
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            $path = public_path('books/');
            !is_dir($path) && mkdir($path, 0777, true);
            $imageName = time() . '.' . $request->cover->extension();
            $request->cover->move($path, $imageName);
            $book->cover = $imageName;
        }
        if ($book->update()) {
            return new RedirectResponse(route('book.index'), ['flash_success' => 'Успешно обновлено']);
        }

        return new RedirectResponse(route('book.index'), ['flash_error' => 'Не удалось обновить']);
    }

    public function destroy($id)
    {
        if (Book::destroy($id)) {
            return new RedirectResponse(route('book.index'), ['flash_success' => 'Успешно удалено']);
        }

        return new RedirectResponse(route('book.index'), ['flash_error' => 'Не удалось удалить']);
    }
}
