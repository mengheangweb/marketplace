<x-master-layout>

    <h3 class="my-3">My Post</h3>

    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($posts as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>
                                {{ $item->title }}
                                <br>

                                <span class="badge bg-secondary">{{ $item->status }}</span>

                            </td>
                            <td>{{ $item->price }}</td>
                            <td>
                                @if($item->image)
                                    <img src="/storage/{{ $item->image }}" class="img-thumbnail" style="width: 50px;" alt="...">
                                @else 
                                    <img src="/asset/thumbnail.png" class="img-thumbnail" style="width: 50px;" alt="...">
                                @endif
                            </td>
                            <td>
                                <a href="/post/edit/{{ $item->id }}" class="btn btn-sm btn-info">Edit</a>
                                <a onclick="return confirm('Are you sure?')" href="/post/delete/{{ $item->id }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-12 mt-3">
                {{ $posts->links() }}
             </div>
        </div>
    </div>

</x-master-layout>