<x-master-layout>

    <h3 class="my-5">Discover all of our posts</h3>
    

      <a href="/post" class="btn btn-danger">Reset</a>

      @foreach($categories as $item)
        <a href="/post?c={{ $item->id }}" class="btn btn-primary">({{ $item->post->count() }})  {{ $item->name }}</a>
      @endforeach

    <div class="row">
        <div class="col-12 mt-3">
            {{ $posts->links() }}
        </div>
      @foreach($posts as $item)
        <div class="col-3">
          <div class="card" style="width: 18rem;">
            @if($item->image)
              <img src="/storage/{{ $item->image }}" class="card-img-top" alt="...">
            @else 
              <img src="/asset/thumbnail.png" class="card-img-top p-5" alt="...">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $item->title }}</h5>
              @if($item->category)
                <span>{{ $item->category->name }}</span>
                <br/>
              @endif
              <span class="display-8">{{ $item->price }}</span>
              <br/>
              <a href="/post/{{ $item->id }}" class="btn btn-primary">Go Detial</a>
            </div>
          </div>
        </div>
      @endforeach
      <div class="col-12 mt-3">
         {{ $posts->links() }}
      </div>
    </div>

</x-master-layout>