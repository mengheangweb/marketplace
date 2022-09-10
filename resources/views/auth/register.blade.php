<x-master-layout>
    <div class="row mt-5">
        <div class="col-md-4">
            <form action="/register" method="post">
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" value="Sophea" name="name" class="form-control" id="inputName" aria-describedby="inputName">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" value="mengheangweb@gmail.com" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="inputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" value="12345678" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="inputPassword2" class="form-label">Retype-Password</label>
                    <input type="password" value="12345678" name="password_confirmation" class="form-control" id="inputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-master-layout>