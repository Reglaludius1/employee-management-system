<x-layout>
    <a href="{{ route('companies.employees.create', ['company' => $company]) }}" type="button" class="btn btn-success btn-sm">Create</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Title</th>
            <th scope="col">Phone</th>
            <th scope="col">Hired</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr id="employee-row-{{ $employee->id }}">
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->title }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->hired ? "True" : "False" }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Actions">
                        <a href="{{ route('companies.employees.show', ['company' => $company, 'employee' => $employee]) }}" type="button" class="btn btn-info btn-sm text-white" disabled="">Show</a>
                        <a href="{{ route('companies.employees.edit', ['company' => $company, 'employee' => $employee]) }}" type="button" class="btn btn-secondary btn-sm" disabled="">Update</a>
                        <button type="button" class="btn btn-danger btn-sm"
                                onclick="deleteEmployee({{ $employee->company_id }}, {{ $employee->id }});">Delete</button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        const deleteEmployee = (companyId, id) => {
            fetch(`/companies/${companyId}/employees/${id}`, {
                method: 'DELETE',
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value
                },
            })
                .then((res) => res.json())
                .then((response) => {
                    document.querySelector(`#employee-row-${id}`).remove();

                    console.log(response);
                });
        }
    </script>
</x-layout>
