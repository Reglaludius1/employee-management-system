<x-layout>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $company->name }}</h5>
            <a href="{{ route('companies.index') }}" class="btn btn-primary">Back to Companies</a>
        </div>
    </div>
</x-layout>
