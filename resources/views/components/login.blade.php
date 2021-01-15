<x-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
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

            <button class="btn btn-success" type="submit">Login</button>
        </div>
    </form>
</x-layout>
