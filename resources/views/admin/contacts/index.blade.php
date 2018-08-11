@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Contacts</h1>
                <table class="mt-5 table-striped table" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($contacts) > 0)
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td><a href="{{ route('admin.contacts.edit', $contact->id) }}">{{ $contact->email }}</a></td>
                                <td>{{ $contact->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.contacts.delete', $contact->id) }}" class="btn btn-danger delete-btn">Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No contacts</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection