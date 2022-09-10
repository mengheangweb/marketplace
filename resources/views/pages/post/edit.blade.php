<x-master-layout>

    <h3 class="my-5">Editing : {{ $post->id }}</h3>

    <div class="row">
        <div class="col-6">

          @if($errors->any())
            <div class="alert alert-danger" role="alert">
              Please fix following errors!
            </div>
          @endif

          <form action="/post/update/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="inputCategory" class="form-label">Category</label>

              <select name="category" aria-label="Choose One" class="form-select  @if($errors->first('category')) is-invalid @endif">
                <option value="">Choose</option>
                @foreach($categories as $item)
                  <option @if(old('category', $post->category_id) == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>

              @if($errors->first('category'))
                <div id="" class="invalid-feedback">
                  {{ $errors->first('category') }}
                </div>
              @endif
            </div>
            <div class="mb-3">
              <label for="inputTitle" class="form-label">Title</label>
              <input type="text" value="{{ old('title', $post->title) }}" name="title" class="form-control @if($errors->first('title')) is-invalid @endif " id="inputTitle" aria-describedby="titleHelp">
              @if($errors->first('title'))
                <div id="" class="invalid-feedback">
                  {{ $errors->first('title') }}
                </div>
              @endif
            </div>
            <div class="mb-3">
              <label for="inputPrice" class="form-label">Price</label>
              <input type="number" value="{{ old('price', $post->price) }}" name="price" class="form-control @if($errors->first('price')) is-invalid @endif" id="inputPrice">
              @if($errors->first('price'))
                <div id="" class="invalid-feedback">
                  {{ $errors->first('price') }}
                </div>
              @endif
            </div>
            <div class="mb-3">
              <label for="inputImage" class="form-label">Image</label>
              <input type="file" name="image" class="form-control @if($errors->first('image')) is-invalid @endif" id="inputImage">
              @if($errors->first('image'))
                <div id="" class="invalid-feedback">
                  {{ $errors->first('image') }}
                </div>
              @endif
              @if($post->image)
              <img src="/storage/{{ $post->image }}" class="img-thumbnail" style="width: 100px;" alt="...">
            @else 
              <img src="/asset/thumbnail.png" class="img-thumbnail" style="width: 100px;" alt="...">
            @endif
            </div>
            <div class="mb-3">
              <label for="inputDescription" class="form-label">Description</label>
              <textarea name="description" class="form-control @if($errors->first('description')) is-invalid @endif" id="inputDescription">{{ old('description', $post->description) }}</textarea>
              @if($errors->first('description'))
                <div id="" class="invalid-feedback">
                  {{ $errors->first('description') }}
                </div>
              @endif
            </div>

            <div class="mb-3">

              @foreach($tags as $item)

              <div class="form-check">
                <input @if(in_array($item->id, old('tag', $post_tag ))) checked @endif class="form-check-input" name="tag[]" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  {{ $item->title }}
                </label>
              </div>

              @endforeach

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          
        </div>
       
    </div>

</x-master-layout>