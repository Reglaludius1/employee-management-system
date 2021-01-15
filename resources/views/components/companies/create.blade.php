<x-layout>
    <form method="POST" action="{{ route('companies.store') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">

            @error('name')
                <strong>{{ $message }}</strong>
            @enderror

            <button class="btn btn-success" type="submit">Create</button>
        </div>
    </form>
</x-layout>
