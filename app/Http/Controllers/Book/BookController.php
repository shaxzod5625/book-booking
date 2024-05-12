<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\AddBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function addBook(AddBookRequest $request): \Illuminate\Http\JsonResponse
    {
        $book = Book::query()->create(array([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'available' => $request->quantity,
            'image' => ''
        ]));

        $fileName = bin2hex(random_bytes(8));
        $image = Storage::disk('public')->putFileAs('books', $request->file('image'), $fileName . $request->file('image')->getClientOriginalName());
        $imageUrl = Storage::url($image);
        $book->update(['image' => $imageUrl]);

        return response()->json($book);
    }

    public function getAll(): \Illuminate\Http\JsonResponse
    {
        $query = Book::query();
        if ($sort = request()->query('sort')) {
            $query->orderBy($sort);
        }
        $books = $query->get();
        return response()->json($books);
    }

    public function getOne(string $id): \Illuminate\Http\JsonResponse
    {
        $book = Book::query()->find($id);
        return response()->json($book);
    }

    public function updateBook(AddBookRequest $request, string $id): \Illuminate\Http\JsonResponse
    {
        $book = Book::query()->find($id);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'available' => $request->quantity,
        ]);

        if ($request->hasFile('image')) {
            $fileName = bin2hex(random_bytes(8));
            $image = Storage::disk('public')->putFileAs('books', $request->file('image'), $fileName . $request->file('image')->getClientOriginalExtension());
            $imageUrl = Storage::url($image);
            $book->update(['image' => $imageUrl]);
        }

        return response()->json($book);
    }

    public function deleteBook(string $id): \Illuminate\Http\JsonResponse
    {
        $book = Book::query()->find($id);
        $book->delete();
        return response()->json(['message' => 'Book deleted']);
    }

    public function bookBook(string $id) : \Illuminate\Http\JsonResponse
    {
        $book = Book::query()->find($id);
        $book->update(['available' => $book->available - 1]);
        return response()->json($book);
    }

    public function receiveBook(string $id) : \Illuminate\Http\JsonResponse
    {
        $book = Book::query()->find($id);
        $book->update(['available' => $book->available + 1]);
        return response()->json($book);
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = Book::query();
        if ($q = $request->query('q')) {
            $query->where('title', 'like', "%$q%")
                ->orWhere('author', 'like', "%$q%");
        }
        $books = $query->get();
        return response()->json($books);
    }
}
