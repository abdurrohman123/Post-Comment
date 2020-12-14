@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- ini form input data --}}
            <div class="pb-2">
                <form class="" action="{{ $variabelUpdate->action }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method($variabelUpdate->method)
                    <div class="form-group has-feedback">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Post Title" value="{{ $postUpdate->title ?? '' }}">
                    </div>
                    <div class="class form-group">
                        <select name="category_id" id="" class="form-control">
                            <option>Pilih Category</option>
                         @foreach ($categories as $category)
                             <option value="{{ $category->id }}"{{ (isset($postUpdate->category_id) && $postUpdate->category_id == $category->id) ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="upload">Upload</label>
                        <input type="file" class="form-control" id="upload" name="upload" placeholder="Upload Post" value="">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="">Content</label>
                        <textarea name="content" id="" cols="" rows="5" class="form-control" 
                            placeholder="Post Content">{{ $postUpdate->content ?? '' }}</textarea>
                    </div>
                    <div class="form-group float-right">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
                <br>
                <br>
                <br>
                <form class="" action="" method="GET">
                    <div class="form-group">
                        <label for="">Pencarian</label>
                        <input type="text" id="cari" name="cari" class="form-control" value="{{ request('cari') }}">
                    </div>
                    <div class="form-group">
                    <select name="categoryCari" id="" class="form-control">
                            <option value="">Pilih Category</option>
                         @foreach ($categories as $category)
                             <option value="{{ $category->id }}" {{ (request('category') == $category->id) ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="from-group">
                        <input type="submit" class="btn btn-success" value="Pencarian">
                    </div>
                </form>
            </div>
            {{-- form input data selesai sampai sini --}}
            @foreach ($postz as $post)
            <div class="card mt-3">
                <div class="card-header" class="float-left">
                    <img src="{{ $post->user->avatar }}" class="img-thumbnail" width="50px"/> - <a href="/profile/{{ $post->user->email }}">{{ $post->user->name }}</a> - {{ $post->created_at->diffForHumans() }}
                   {{-- if ini adalah untuk mengatur tombol yg muncul sesuai id masuk --}}


                   @if ($post->user_id == auth()->id())

                    <a href="/post?id={{ $post->id }}" class="btn btn-sm btn-info float-right ml-1">
                        <span class="mdi mdi-pencil"></span>
                        </a>

                    <form class="float-right" action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apa Yakin Anda Akan Menghapus Data ini?');">
                            <span class="mdi mdi-delete-empty"></span>
                        </button>
                    </form>
                    @endif
                </div>
                {{-- isi content --}}
                <div class="card-body">
                   <a href="/hide/{{ $post->id }}"><span class="mdi mdi-comment-remove-outline float-right" id="status" name="status" >Hide</span></a>
                    <a href="/post/{{ $post->slug }}">{{ $post->title }}</a> -- <span class="#">{{ $post->category->name }}</span>
                    <p><img src="{{ $post->upload }}" class="img-thumbnail" width="50px"/></p>
                    <p>{{ Str::limit($post->content, 100,'....') }}</p>
                    <div class="panel-footer">
                       <a href="/like/{{ $post->id }}?jenis=post"><span class="mdi mdi-thumb-up-outline"> {{$post->likes->count()}}</span></a> 
                       {{-- jad yang di maksud {{$post->likes->count()}} $post meruju ke variabel post yg ada di PostController Dan 
                       likes ini adalah yg sudah di relasikan di method index yg ada di kata (with) di PostController Dan Count untuk menghitung --}}
                       <a href="/post/{{ $post->slug }}"><span class="mdi mdi-comment-processing-outline"></span> {{$post->comments->count()}}</a> 
                       <a href="/report/{{ $post->id }}?pilih=post"><span class="mdi mdi-information-outline">Report  {{$post->reports->count()}}</span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
