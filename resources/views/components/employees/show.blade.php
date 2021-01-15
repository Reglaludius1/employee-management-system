<x-layout>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $employee->name }}</h5>
            <h5 class="card-title">Surname: {{ $employee->surname }}</h5>
            <h5 class="card-title">Title: {{ $employee->title }}</h5>
            <h5 class="card-title">Phone: {{ $employee->phone }}</h5>
            <h5 class="card-title">Hired: {{ $employee->hired ? "True" : "False" }}</h5>
            <a href="{{ route('companies.employees.index', ['company' => $company]) }}" class="btn btn-primary">Back to Employees</a>
        </div>
    </div>
</x-layout>
