<?php

namespace App\Http\Controllers;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
     // スレッド一覧表示
     public function index()
     {
         $threads = Thread::all();
         return view('threads.index', compact('threads'));
     }

     // スレッド作成画面の表示
     public function create()
     {
         return view('threads.create');
     }

     // スレッドの保存
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|max:255',
             'content' => 'required',
         ]);

         Thread::create([
             'title' => $request->title,
             'content' => $request->content,
         ]);


         return redirect()->route('threads.index');
     }

     public function show($id)
    {
        $thread = Thread::findOrFail($id);
        return view('threads.show', compact('thread'));
    }
}
