@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" class="float-left">
                    {{ $post->title }} - {{ $post->created_at->diffForHumans() }}
                </div>
                <div class="card-body">
                    <p>{{ $post->content }}</p>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header" class="float-right">
                    Tambahkan Komentar
                </div>
                @foreach ($post->comments()->get() as $postComment)
                <div class="card-body">
                    @if ($postComment->user_id == auth()->id())
                    <a href="/post/{{ $post->slug }}?id={{ $postComment->id }}" class="btn btn-sm btn-info float-right ml-1">
                        <span class="mdi mdi-pencil"></span>
                        </a>
                    <form class="float-right" action="{{ route('comment.destroy', $postComment) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-danger">
                            <span class="mdi mdi-delete-empty"></span>
                        </button>
                    </form>
                    @endif
                    <h6>{{ $postComment->user->name }} - {{ $postComment->created_at->diffForHumans() }}</h6>
                    <p>{{ $postComment->massage }}</p>
                    <div class="panel-footer">
                        <a href="/like/{{ $postComment->id }}?jenis=comment"><span class="mdi mdi-thumb-up-outline"> {{$postComment->likes->count()}}</span></a>
                    
                        <a href="/report/{{ $postComment->id }}?pilih=comment"><span class="mdi mdi-information-outline">Report {{$postComment->reports->count()}}</span></a>
                    </div>
                    <hr size="10px">
                </div>
                @endforeach
                <div class="card-body">
                    <form action="{{ $update->action }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        @method($update->method)
                        <textarea name="massage" id="" cols="30" rows="5" class="form-control"
                            placeholder="Tambahkan Komentar">{{ $commentEdit->massage ?? '' }}</textarea>
                        <div class="form-group">
                            <input type="submit" value="Kirim" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection