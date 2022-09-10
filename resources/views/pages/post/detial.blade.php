<x-master-layout>

    <h3 class="my-5">{{ $post->title }}</h3>

    <div class="row">
        <div class="col-8">
          @if($post->image)
              <img src="/storage/{{ $post->image }}" class="card-img-top" alt="...">
            @else 
              <img src="/asset/thumbnail.png" class="card-img-top p-5" alt="...">
            @endif
        </div>
        <div class="col-4">
          <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Price: <span class="display-3">{{ $post->price }}</span></li>
              <li class="list-group-item">Cateogry: {{ $post->category->name }}</li>
            </ul>
          </div>
          <div class="mt-3">
            @foreach($tags as $item)

              <span class="badge bg-secondary">{{ $item->title }}</span>

            @endforeach
          </div>

          
          <a href="/post/{{ $post->id }}" class="btn btn-primary mt-5">Contact Seller Now</a>
          
          <hr>
          <div>
            <span>Posted By: {{ $post->user->name }}</span>
          </div>
        </div>
        <div class="col-8 mt-3">

          {{ $post->description }}
        </div>
    </div>

</x-master-layout>