<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Session;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $srcstring = $request->squery;
        $threads = Thread::Where('title', 'ILIKE', "%".$srcstring."%")->get();
        $categories = Category::all();
        return view('pages.search', ['categories' => $categories, 'searchstr' => $srcstring, 'threads' => $threads, 'prevreq' => $request]);
    }

    public function showUserSearch(Request $request){
        $srcstring = $request->squery;
        $users = User::Where('username', 'ILIKE', "%".$srcstring."%")->get();
        $categories = Category::all();
        return view('pages.searchUser', ['categories' => $categories, 'searchstr' => $srcstring, 'users' => $users, 'prevreq' => $request]);
    }
    
    public function filterSearch(Request $request)
    {
        $text = $request->input('searchstr');
        $array = [];

        for($i = 0; $i < 10; $i++){
            $name = 'category'.$i;
            if($request->input($name) != -1 && $request->input($name) != null)
                array_push($array, $request->input($name));
        }

        $aux = new Thread();
        $threads = $aux->filterThread($request, $array);
        $categories = Category::all();
        return view('pages.search', ['categories' => $categories, 'searchstr' => $text, 'threads' => $threads, 'prevreq' => $request]);
    }

    public function filterUserSearch(Request $request)
    {
        $text = $request->searchstr;

        $array = [];

        for($i = 0; $i < 10; $i++){
            $name = 'category'.$i;
            if($request->input($name) != -1 && $request->input($name) != null)
                array_push($array, $request->input($name));
        }
        
        $aux = new User();
        $users = $aux->filterUser($request, $array);
        $categories = Category::all();
        return view('pages.searchUser', ['categories' => $categories, 'searchstr' => $text, 'users' => $users, 'prevreq' => $request]);
    }
}
