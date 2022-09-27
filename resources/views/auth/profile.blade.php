<x-master-layout>

    <h3 class="my-3">Profile</h3>

    <h5 class="mt-5">Basic Info</h5>
    <div class="row m3-5">
        <div class="col-md-4">
            <form action="/profile" method="post">
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" value="{{ old('name', auth()->user()->name) }}" name="name" class="form-control" id="inputName" aria-describedby="inputName">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" value="{{ old('email', auth()->user()->email) }}" name="email" class="form-control @if($errors->first('email')) is-invalid @endif" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @if($errors->first('email'))
                        <div id="" class="invalid-feedback">
                        {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

  
</x-master-layout>