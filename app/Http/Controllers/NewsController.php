<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
{
    public function category($id)
    {
        $news = News::select(['id', 'title', 'image', 'description'])
            ->where('category_id', $id)->get();
        return view('category', compact('news'));
    }

    public function show($id)
    {
        $new = News::find($id);
        return view('show', compact('new'));
    }

    public function email(Request $request)
    {
        Mail::to('cc602155776@gmail.com')->send(new Message($request->name, $request->address, $request->message));
        return 'true';
    }
}
