@extends('layouts.app')

@section('content')

<div class="backgroundimg"></div>
<div class="create-a-post-remember w-75">
  <div class="create-a-post container float-md-left">
    <h1 class="my-4">Create a Post</h1>
    <hr/>
    <form method="post" action="/create_thread" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label required">Title</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" title="Thread title. Max lenght: 100 characters" name="title" type="text" rows="1" placeholder="Title" aria-label="default input example" maxlength="100" required>{{old('title')}}</textarea>

        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label required">Summary</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" title="A brief description of your thread. Max lenght: 300 characters" name="summary" rows="3" style="height: 150px" placeholder="Summary" aria-label="default input example" maxlength="300" required>{{old('summary')}}</textarea>
        </div>
        <div>
          <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label required">Main Category</label>
        </div>
        <div class="mb-3">
          <input class="form-check-input" type="radio"  name="mainCategory" value="1" @if(old('mainCategory') == 1) checked @endif>
          <label class="form-check-label" for="inlineCheckbox1">News</label>
          <input class="form-check-input" type="radio"  name="mainCategory" value="2" @if(old('mainCategory') == 2) checked @endif>
          <label class="form-check-label" for="inlineCheckbox1">Reviews</label>
        </div>
        <div class="d-block mb-1">
            <label for="exampleFormControlTextarea1" style="font-size: large;" title="Your thread must contain one of the categories News or Reviews" class="form-label required">Categories &#9432;</label>
            @if ($errors->first('categories'))
              <span class="error">
                {{ $errors->first('categories') }}
              </span>
            @endif
        </div>

        <div class="mb-3">
          @foreach ($categories as $category)
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox"  name="categories[]" value="{{$category->id}}" @if(is_array(old('categories')) && in_array($category->id, old('categories'))) checked @endif>
              <label class="form-check-label" for="inlineCheckbox1">{{$category->name}}</label>
            </div>
          @endforeach

        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label required">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" title="The thread's body. No character limit" name="description" rows="3" style="height: 500px" placeholder="Description" aria-label="default input example" required>{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
          <label for="formFileMultiple" style="font-size: large;" class="form-label">Upload Images</label>
        </div>
        <div class="row justify-content-center mb-3">
          <input class="form-control-file" type="file" name="images[]" id="formFileMultiple" multiple>
        </div>
        <div class="col12 d-flex justify-content-end" style="position:relative; bottom: 2vh;">
          <button class="btn-lg btn-primary btn-primary text-center w-25 p-2" type="submit">POST</button>
        </div>
    </form>
  </div>
  <div class="card remember-posting d-none d-md-block mb-3 p-3 h-100">
      <div class="card-title info m-0 pb-3 posting-to-rng-title d-flex text-center">
          <div class="w-100 d-flex justify-content-center">
              <img src="{{asset('images/logoshort.png')}}" alt="logo-image" width="32px" height="22px" class="me-2 align-self-center">
              <h5 class="m-0">Posting to RNG</h5>
          </div>
      </div>
      <div class="card-category">
          <h6 class="m-0">1. Don't be offensive</h6>
      </div>
      <div class="card-category">
          <h6 class="m-0">2. Behave like you would in real life</h6>
      </div>
      <div class="card-category">
          <h6 class="m-0">3. Look for the original source of content</h6>
      </div>
      <div class="card-category">
          <h6 class="m-0">4. Search for duplicates before posting</h6>
      </div>
      <div class="card-category">
          <h6 class="m-0">5. Read the FAQs</h6>
      </div>
  </div>
</div>

@endsection
