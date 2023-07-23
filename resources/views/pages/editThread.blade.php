@extends('layouts.app')

@section('content')

<div class="backgroundimg"></div>
<div class="create-a-post-remember w-75">
  <div class="create-a-post container float-md-left">
    <h1 class="my-4">Edit the Post</h1>
    <hr/>
    <form method="post" action="/threads/{{$thread->id}}/edit" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label required">Title</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" title="Thread title. Max lenght: 100 characters" name="title" type="text" rows="1" placeholder="Title" aria-label="default input example" maxlength="100" required>{{$thread->title}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label required">Summary</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" title="A brief description of your thread. Max lenght: 300 characters" rows="3" name="summary" style="height: 150px" aria-label="default input example" maxlength="300" required>{{$thread->summary}}</textarea>
        </div>
        <div>
          <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label required">Main Category</label>
        </div>
        <div class="mb-3">
          <input class="form-check-input" type="radio"  name="mainCategory" value="1" @if($categories->contains('name', 'News')) checked @endif>
          <label class="form-check-label" for="inlineCheckbox1">News</label>
          <input class="form-check-input" type="radio"  name="mainCategory" value="2" @if($categories->contains('name', 'Reviews')) checked @endif>
          <label class="form-check-label" for="inlineCheckbox1">Reviews</label>
        </div>
        <div class="mb-1">
            <label for="exampleFormControlTextarea1" style="font-size: large;" title="Your thread must contain one of the categories News or Reviews" class="form-label required">Categories &#9432;</label>
          @if ($errors->first('categories'))
            <span class="error">
              {{ $errors->first('categories') }}
            </span>
          @endif
        </div>
        <div class="mb-3">
         
          @foreach ($allCategories as $category)
            @if ($categories->contains('name', $category->name) && !$errors->any())
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="categories[]" value="{{$category->id}}" checked>
                <label class="form-check-label" for="inlineCheckbox1">{{$category->name}}</label>
              </div>
            @else
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="categories[]" value="{{$category->id}}">
                <label class="form-check-label" for="inlineCheckbox1">{{$category->name}}</label>
              </div>              
            @endif
          @endforeach
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label required">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" title="The thread's body. No character limit" rows="3" name="description" style="height: 500px" aria-label="default input example" required>{{$thread->description}}</textarea>
        </div>
        <div class="mb-3">
          @for ($i = 0; $i < $images->count(); $i++)
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox8" name="oldImages[]" value="{{$images[$i]->id}}" checked>
              <label class="form-check-label" for="inlineCheckbox8">Image{{$i}}</label>
            </div>
          @endfor           
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" style="font-size: large;" class="form-label">Upload Images</label>
        </div>
        <div class="row justify-content-center mb-3">
            <input class="form-control-file" type="file" name="images[]" id="formFileMultiple" multiple>
        </div>
        <div class="col12 d-flex justify-content-end" style="position:relative; bottom: 2vh;">
          <button class="btn-lg btn-primary btn-primary text-center w-25 p-2" type="submit">UPDATE</button>
        </div>
    </form>
  </div>
  <div class="card remember-posting d-none d-md-block mb-3 w-50 h-100">
    <div class="card-body">
        <h5 class="card-title posting-to-rng-title d-flex"> 
            <p class="w-100"> <img src={{asset('images/logoshort.png')}} width="30vw">Posting to RNG</p>
        </h5>
        <h6 class="posting-to-rng">
          <p>
              1. Don't be offensive
          </p>
          <p>
              2. Behave like you would in real life
          </p>
          <p>
              3. Look for the original source of content
          </p>
          <p>
              4. Search for duplicates before posting
          </p>
          <p>
              5. Read the FAQs
          </p>
        </h6>
    </div>
  </div>
</div>


@endsection