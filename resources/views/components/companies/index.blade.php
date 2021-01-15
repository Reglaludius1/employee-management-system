<x-layout>
    <a href="{{ route('companies.create') }}" type="button" class="btn btn-success btn-sm">Create</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr id="company-row-{{ $company->id }}">
                <td>{{ $company->id }}</td>
                @can('viewEmployees', $company)
                <td><a href="{{ route('companies.employees', ['company' => $company]) }}">{{ $company->name }}</a></td>
                @endcan
                @cannot('viewEmployees', $company)
                    <td>{{ $company->name }}</td>
                @endcan
                <td>
                    <div class="btn-group" role="group" aria-label="Actions">
                        <a href="{{ route('companies.show', ['company' => $company]) }}" type="button" class="btn btn-info btn-sm text-white" disabled="">Show</a>
                        @canany(['update', 'delete'], $company)
                        <a href="{{ route('companies.edit', ['company' => $company]) }}" type="button" class="btn btn-secondary btn-sm" disabled="">Update</a>
                        <button type="button" class="btn btn-danger btn-sm"
                            onclick="deleteCompany({{ $company->id }});">Delete</button>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        const deleteCompany = (id) => {
            fetch(`/companies/${id}`, {
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
                    if (response['message'] === `Deleted company #${id} successfully.`) {
                        document.querySelector(`#company-row-${id}`).remove();
                    }

                    console.log(response);
                });
        }
    </script>
</x-layout>
