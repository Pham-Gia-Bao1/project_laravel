
@extends('admin.Layout')
<style>
    .alert-success{
    border-left: 10px solid #00c069 !important;
    }
</style>
@section('main_content_admin')
    <main>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">products</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Contact Management</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th style="padding-right: 10px; text-align: center;">Message ID</th>
                            <th style="padding-right: 10px">First Name</th>
                            <th style="padding-right: 10px">Last Name</th>
                            <th style="padding-right: 10px">Email</th>
                            <th style="padding-right: 10px">Message</th>
                            <th style="padding-right: 10px">Replies</th>
                            <th style="padding-right: 10px; text-align: center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td style="vertical-align: middle !important;">{{$contact->id}}</td>
                            <td style="padding-right: 10px; width:10px">{{$contact->first_name}}</td>
                            <td style="padding-right: 10px">{{$contact->last_name}}</td>
                            <td style="padding-right: 10px" class='email'>{{$contact->email}}</td>
                            <td> {{$contact->message}} </td>
                            <td>
                                <button class="btn btn-outline-primary"><span class="material-symbols-outlined">
                                    undo
                                    </span></button>
                            </td>
                            <td>
                                <form action=" {{ route('contacts.update', $contact->id) }}" id="updateStatusForm-{{ $contact->id }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="btn-group">
                                        <input onchange="handleUpdate('{{ $contact->id }}')" type="radio" class="btn-check" name="status"
                                            id="new-{{ $contact->id }}" value="Responsed" {{ $contact->status == 'Responsed' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary" for="new-{{ $contact->id }}">Responsed</label>
                                        <input onchange="handleUpdate('{{ $contact->id }}')" type="radio" class="btn-check"
                                            name="status" id="Have not responsed-{{ $contact->id }}" value="Have not responsed"
                                            {{ $contact->status == 'Have not responsed' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary" for="Have not responsed-{{ $contact->id }}">Have not responsed</label>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
<script>
    function handleUpdate(id) {
        var confirmation = confirm("Are you sure you want to update the contact status?");
        if (confirmation) {
            document.getElementById(`updateStatusForm-${id}`).submit();
        } else {
            location.reload()
        }
    }
</script>
<style>

</style>
