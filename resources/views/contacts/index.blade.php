@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Contacts List</h2>

    
    <!-- <div class="col-md-6 col-lg-6">
        
    </div> -->
    
    <div class="mt-5 mb-3">
        <form class="d-inline-block" action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="xml_file" required>
        <button type="submit" class="btn btn-success">Import XML</button>
        </form>
        <a href="{{ route('contacts.create') }}" class="btn btn-primary float-end">+ Create</a>
    </div>
    
    
    @if(session('success'))
        <p id="msg" class="alert alert-success">{{ session('success') }}</p>
    @endif

    <table class="table">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>

    @forelse ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="text-center">Data not found</td>
        </tr>
    @endforelse
</table>
</div>
<script>
    const successMessage = document.getElementById('msg');
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 3000);
    }

</script>
@endsection

