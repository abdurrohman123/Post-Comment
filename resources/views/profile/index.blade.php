@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="pb-4">
                <form class="pb-5" action="/profile/{{ $user->id }}/update" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_hp">Nomor Hp</label>
                            <input type="text" class="form-control" id="nohp" name="nohp" value="{{$user->nohp}}"> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{$user->alamat}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="avatar">Photo</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" value="">
                        </div>
                    </div>
                    <div class="form-group col-md-2 float-right">
                        <button type="submit" class="form-control btn btn-primary">Simpan</button>
                    </div>
                </form>
                @foreach ($user->postUser()->get() as $post)
                <div class="card mt-2">
                    <div class="card-header" class="float-right">
                        <form class="float-right" action="" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apa Yakin Anda Akan Menghapus Data ini?');">
                                <i class="mdi mdi-delete"></i>
                            </button>
                            <a href="" class="btn btn-sm btn-primary float-right"><i class="mdi mdi-pencil"></i></a> 
                        </form>
                        <h6>{{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}</h6>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->title }}</p>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection