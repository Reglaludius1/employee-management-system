<x-layout>
    <form method="POST" action="{{ route('companies.employees.update', ['company' => $company, 'employee' => $employee]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name) }}">

            @error('name')
            <strong>{{ $message }}</strong>
            @enderror

            <label>Surname</label>
            <input type="text" name="surname" class="form-control" value="{{ old('surname', $employee->surname) }}">

            @error('surname')
            <strong>{{ $message }}</strong>
            @enderror

            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $employee->title) }}">

            @error('title')
            <strong>{{ $message }}</strong>
            @enderror

            <label>Phone</label>
            <input type="number" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">

            @error('phone')
            <strong>{{ $message }}</strong>
            @enderror

            <label>Hired</label>
            <input type="text" name="hired" class="form-control" value="{{ old('hired', $employee->hired) }}">

            @error('hired')
            <strong>{{ $message }}</strong>
            @enderror

            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</x-layout>
