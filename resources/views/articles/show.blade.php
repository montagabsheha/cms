@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Show Article</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Title: {{ $article->title }}
            </div>
            {{--<div>--}}
                {{--Email: {{ $user->email }}--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--Username: {{ $user->username }}--}}
            {{--</div>--}}
            @foreach($article_items as $item)
                <tr>
                    {{--<td>{{ getImaginedChairNumber() }}</td>--}}
                    {{--<td>{{ $time->availble_times }}</td>--}}
                    @if($item->type == 2)
                        {{-- There is already booking for that dictionary time --}}
                        <p>{{ $item->content }}</p>
                        <br>
                    @else
                        <img src="{{$item->content}}"></img>
                        <br>
                    @endif
                </tr>
            @endforeach
        </div>

    </div>
    <div class="mt-4">
        {{--<a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>--}}
        <a href="{{ route('home.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
