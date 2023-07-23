<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Thread;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Validator;
use Redirect;
use Response;

class HomeController extends Controller
{

    public function generateCategories(){
      $categories = Category::all()->sort(function($a, $b){ return $a->threads->count() < $b->threads->count();});
      $count = 0;
      foreach($categories as $category){
          if(strcmp($category->name, "Reviews") === 0 || strcmp($category->name, "News") === 0) continue;
          $topcat[$count] = $category;
          $count++;
          if($count === 5) break;
      }
      return $topcat;
    }

    public function generateHtml($threads){
      $html = "";
      foreach($threads as $thread){
        $html.='
                        <div class="thread-card d-flex m-2 mt-3" style="width: 100%;">
                                <div class="vote d-flex justify-content-center align-content-center align-items-center">
                                    <div class="votes">
                                        <button class="material-icons upvote d-flex justify-content-center" data-id="'.$thread->id.'"';
                                        if(Auth::check() && $thread->hasVoted(Auth::user()->id) != null && $thread->hasVoted(Auth::user()->id)->upvote == true){
                                          $html.='style="color:var(--logoblue);"';
                                        }
                                        $html.='>
                                            keyboard_arrow_up
                                        </button>
                                        <p class="d-flex justify-content-center" data-id="'.$thread->id.'">'.$thread->rating.'</p>
                                        <button class="material-icons downvote d-flex justify-content-center" data-id="'.$thread->id.'"';
                                        if(Auth::check() && $thread->hasVoted(Auth::user()->id) != null && $thread->hasVoted(Auth::user()->id)->upvote == false){
                                          $html.='style="color:var(--dangercolor);"';
                                        }
                                        $html.='>
                                            keyboard_arrow_down
                                        </button>
                                    </div>
                                </div>
                              <a class="text-decoration-none text-reset" href="/threads/'. $thread->id. '">
                              <div class="card-grid">
                                <div class="title">'.$thread->title.'</div>
                                <div class="text">'.$thread->summary.'</div>
                                <div class="buttons">
                                    <div class="comments">
                                      <span class="material-icons">
                                          mode_comment
                                      </span>
                                        <span class="full-icondescription">'.$thread->comments->count().' comments</span>
                                        <span class="short-icondescription">'.$thread->comments->count().'</span>
                                    </div>
                                    <div class="postedby">
                                      <span class="material-icons">
                                          person
                                      </span>
                                      <span class="full-icondescription">Posted by '.$thread->owner->username.'</span>
                                      <span class="short-icondescription">'.$thread->owner->username.'</span>
                                    </div>
                                    <div class="time">
                                      <span class="material-icons">
                                          access_time
                                      </span>
                                      <span class="full-icondescription">'.$thread->creation_date.'</span>
                                      <span class="short-icondescription">'.explode(' ', $thread->creation_date)[1].'</span>
                                    </div>
                                </div>';
          if($thread->images->count() != 0){
              $html.='<div class="image">
                        <img src="data:image;base64,'.stream_get_contents($thread->images[0]->image).'" alt="..." class=".figure-img">
                      </div>
                      </div>
                      </a>';
          }
          else {
            $html.='<div class="image">
                        <img src='.asset("images/noimage.jpg").' alt="...">
                      </div>
                      </div>
                      </a>';
          }
          $html.='
                    </div>
                  ';
        }
      return $html;
    }

    public function showTopThreads(Request $request)
    {
      $topcat = $this->generateCategories();
      $topthreads = Thread::orderBy('rating', 'desc')->orderBy('id', 'asc')->paginate(10);
      $topflag = true;
      $newsflag = false;
      $reviewflag = false;
      if($request->ajax()){
          return $this->generateHtml($topthreads);
        }
      return view('pages.home', ['topcat' => $topcat, 'topflag' => $topflag, 'newsflag' => $newsflag, 'reviewflag' => $reviewflag]);
    }

    public function showRecentThreads(Request $request)
    {
      $topcat = $this->generateCategories();
      $recentthreads = Thread::orderBy('creation_date', 'desc')->orderBy('id', 'asc')->paginate(10);
      $topflag = false;
      $newsflag = false;
      $reviewflag = false;
      if($request->ajax()){
          return $this->generateHtml($recentthreads);
        }
      return view('pages.home', ['topcat' => $topcat, 'topflag' => $topflag, 'newsflag' => $newsflag, 'reviewflag' => $reviewflag]);
    }

    public function showTopNews(Request $request)
    {
      $topcat = $this->generateCategories();
      $aux = new Thread();
      $newsthreads = $aux->findNews();
      $topflag = true;
      $newsflag = true;
      $reviewflag = false;
      $topnews = $newsthreads->orderByDesc('rating')->orderBy('id', 'asc')->paginate(10);


      if($request->ajax()){
        return $this->generateHtml($topnews);
      }

      return view('pages.home', ['topcat' => $topcat, 'topflag'=>$topflag, 'newsflag' => $newsflag, 'reviewflag' => $reviewflag]);
    }

    public function showRecentNews(Request $request)
    {
      $topcat = $this->generateCategories();
      $aux = new Thread();
      $newsthreads = $aux->findNews();
      $topflag = false;
      $newsflag = true;
      $reviewflag = false;
      $recentnews = $newsthreads->orderByDesc('creation_date')->orderBy('id', 'asc')->paginate(10);

      if($request->ajax()){
        return $this->generateHtml($recentnews);
      }

      return view('pages.home', ['topcat' => $topcat, 'topflag'=>$topflag, 'newsflag' => $newsflag, 'reviewflag' => $reviewflag]);
    }

    public function showTopReviews(Request $request)
    {
      $topcat = $this->generateCategories();
      $aux = new Thread();
      $reviewthreads = $aux->findReviews();
      $topflag = true;
      $newsflag = false;
      $reviewflag = true;
      $toprevs = $reviewthreads->orderByDesc('rating')->orderBy('id', 'asc')->paginate(10);

      if($request->ajax()){
        return $this->generateHtml($toprevs);
      }

      return view('pages.home', ['topcat' => $topcat, 'topflag'=>$topflag, 'newsflag' => $newsflag, 'reviewflag' => $reviewflag]);
    }

    public function showRecentReviews(Request $request)
    {
      $topcat = $this->generateCategories();
      $aux = new Thread();
      $reviewthreads = $aux->findReviews();
      $topflag = false;
      $newsflag = false;
      $reviewflag = true;
      $recentrevs = $reviewthreads->orderByDesc('creation_date')->orderBy('id', 'asc')->paginate(10);

      if($request->ajax()){
        return $this->generateHtml($recentrevs);
      }

      return view('pages.home', ['topcat' => $topcat, 'topflag'=>$topflag, 'newsflag' => $newsflag, 'reviewflag' => $reviewflag]);
    }

}
