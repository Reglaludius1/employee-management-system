<x-layout>
    <form method="POST" action="{{ route('companies.update', ['company' => $company]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}">

            @error('name')
            <strong>{{ $message }}</strong>
            @enderror

            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</x-layout>
