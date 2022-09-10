<x-master-layout>

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Marketplace</h1>
        <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <a href="/post/new" class="btn btn-primary btn-lg" type="button">Create your post now</a>
      </div>
    </div>

    <h3 class="mb-3">Latest Post</h3>

    <div class="row">
      @foreach($posts as $item)
        <div class="col-3">
          <div class="card" style="width: 18rem;">
            <img src="/storage/{{ $item->image }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $item->title }}</h5>
              <span class="display-8">{{ $item->price }}</span>
              <br/>
              <a href="/post/{{ $item->id }}" class="btn btn-primary">Go Detial</a>
            </div>
          </div>
        </div>
      @endforeach
      <div class="col-2 mt-3">
        <a href="/post" class="btn btn-info">See More</a>
      </div>
    </div>

</x-master-layout>