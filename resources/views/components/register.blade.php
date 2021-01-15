<x-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">

            @error('name')
                <strong>{{ $message }}</strong>
            @enderror

            <label>Email</label>
            <input type="text" name="email" class="form-control">

            @error('email')
                <strong>{{ $message }}</strong>
            @enderror

            <label>Password</label>
            <input type="password" name="password" class="form-control">

            @error('password')
                <strong>{{ $message }}</strong>
            @enderror

            <button class="btn btn-success" type="submit">Register</button>
        </div>
    </form>
</x-layout>
