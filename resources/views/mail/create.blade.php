<x-layout>
    <form action="{{ route('mail.send') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Send Mail</label>
            <input type="email" name="mail">

            @error('mail')
            <strong>{{ $message }}</strong>
            @enderror

            <button class="btn btn-success" type="submit">Send</button>
        </div>
    </form>
</x-layout>
