@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mx-auto">
        <!-- Profile widget -->
       
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3"><img src="{{ $show->avatar }}" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                       @if ($show->id == auth()->id()) )
                       <a href="/profile" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
                       @endif 
                        </div>
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-0">{{ $show->name }}</h4>
                        <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $show->alamat }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><span class="mdi mdi-email"></span></h5>
                        {{ $show->email }}
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><span class="mdi mdi-cellphone-basic"></span></h5>
                        {{ $show->nohp }}
                    </li>
                </ul>
            </div>
            {{-- ------------------------------------------------------------------------------------------------------------- --}}
            <div class="container mt-3">
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Data Post</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Post Hide</a>
                  </li>
                </ul>
              
                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="home" class="container tab-pane active"><br>
                    <div class="container">
                        @foreach ($show->profileShow()->get() as $tampilkan)
                        <div class="card mt-2">
                            <div class="card-header" class="float-right">
                                <h6>{{ $tampilkan->user->name }} - {{ $tampilkan->created_at->diffForHumans() }}</h6>
                            </div>
                            <div class="card-body">
                                <p>{{ $tampilkan->title }}</p>
                                <p>{{ $tampilkan->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
                  <div id="menu1" class="container tab-pane fade"><br>
                    <div class="container">
                        @foreach ($pos as $tampilkan)
                        <div class="card mt-2">
                            <div class="card-header" >
                                <a href="/hide/{{ $tampilkan->id }}?tebak=hide"><span class="mdi mdi-comment-remove-outline float-right">Unhide </span></a>
                                <h6>{{ $tampilkan->user->name }} - {{ $tampilkan->created_at->diffForHumans() }}</h6>
                            </div>
                            <div class="card-body">
                                <p>{{ $tampilkan->title }}</p>
                                <p>{{ $tampilkan->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection