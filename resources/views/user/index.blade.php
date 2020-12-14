@extends('layouts.app')
@section('content')

<div class="container">
    <form class="form-inline mr-auto" action="" method="GET">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" name="cari" aria-label="Search"
            value="{{ request('cari') }}">
        
        <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">Search</button>
    </form>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No.Hp</th>
            <th>Alamat</th>
            <th>Avatar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
         $no = 1;   
        @endphp
        @foreach ($dataUser as $users)
        <tr>
            <th>{{ $no++ }}</th>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->nohp }}</td>
            <td>{{ $users->alamat }}</td>
            <td><img src="{{ $users->avatar }}" class="img-thumbnail" width="100px"></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>
    
@endsection