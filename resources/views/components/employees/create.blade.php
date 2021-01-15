<x-layout>
    <form method="POST" action="{{ route('companies.employees.store', ['company' => $company]) }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">

            @error('name')
            <strong>{{ $message }}</strong>
            @enderror

            <label>Surname</label>
            <input type="text" name="surname" class="form-control">

            @error('surname')
            <strong>{{ $message }}</strong>
            @enderror

            <label>Title</label>
            <input type="text" name="title" class="form-control">

            @error('title')
            <strong>{{ $message }}</strong>
            @enderror

            <label>Phone</label>
            <input type="number" name="phone" class="form-control">

            @error('phone')
            <strong>{{ $message }}</strong>
            @enderror

            <label>Hired</label>
            <input type="text" name="hired" class="form-control">

            @error('hired')
            <strong>{{ $message }}</strong>
            @enderror

            <button class="btn btn-success" type="submit">Create</button>
        </div>
    </form>
</x-layout>
