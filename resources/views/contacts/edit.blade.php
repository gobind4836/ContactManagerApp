@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Contact</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}" required  pattern="^\+\d{12}$" title="Phone number must start with + and be exactly 13 characters long (e.g., +123456789012)">
        </div>

        <button type="submit" class="btn btn-primary">Update Contact</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script>
     document.getElementById('phone').addEventListener('input', function (e) 
        {
            this.value = this.value.replace(/[^+\d]/g, ''); 
            if (!this.value.startsWith('+')) {
            this.value = '+' + this.value.replace(/\+/g, ''); 
        }
            if (this.value.length > 13) 
            {
                this.value = this.value.slice(0, 13);
            }
        });
    
</script>
@endsection

