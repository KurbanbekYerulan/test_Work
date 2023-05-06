<?php

namespace App\Http\Controllers;

use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = Comment::create([
            'comment' => $request->comment,
            'username' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
            'book_id' => $request->id
        ]);
        return new RedirectResponse(route('comment.show', $request->id), ['flash_success' => 'Успешно сохранено']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::with('comments')->find($id);
        return new ViewResponse('comment.index', ['data' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Comment::with('book')->find($id);
        $bookId = $book->book->id;
        Comment::destroy($id);
        return new RedirectResponse(route('comment.show', $bookId), ['flash_success' => 'Успешно удалено']);
    }
}
