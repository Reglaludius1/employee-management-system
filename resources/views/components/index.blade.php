<x-layout>
    <h1>Go to <a href="{{ route('companies.index') }}" style="color: blue;">Companies</a></h1>
    @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role === 'admin')
        <h1>Go to <a href="{{ route('mail.create') }}" style="color: blue;">Mail</a></h1>
    @endif
</x-layout>
