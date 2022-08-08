@extends('layouts.app-master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    {{--<script src="../../../resources/js/simple-image.js"></script>--}}
    <link href="{!! url('assets/bootstrap/css/simple-image.css') !!}" rel="stylesheet"/>
    <script src="{!! url('assets/bootstrap/js/simple-image.js') !!}"></script>
<div class="bg-light p-4 rounded">
    <h1>Add new Article</h1>
    <div class="lead">

    </div>




    <div class="container mt-4">
        <form method="post"  id="savearticle" action="{{ route('articles.store') }}">
            <input type="hidden" name="output" id="output"></input>
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"
                       class="form-control"
                       name="title"
                       placeholder="title" required>
            </div>

            {{--<div class="mb-3">--}}
                {{--<label for="type" class="form-label">Type</label>--}}
                {{--<input type="number"--}}
                       {{--name="type"--}}
                       {{--default=1--}}
                       {{--placeholder="type" required>--}}
            {{--</div>--}}
            {{--<div class="mb-3">--}}
                {{--<label for="content" class="form-label">Content</label>--}}
                {{--<input type="text"--}}
                       {{--class="form-control"--}}
                       {{--name="content"--}}
                       {{--placeholder="content" required>--}}
            {{--</div>--}}
            {{--<div class="mb-3">--}}
                {{--<label for="email" class="form-label">Email</label>--}}
                {{--<input value="{{ old('email') }}"--}}
                       {{--type="email"--}}
                       {{--class="form-control"--}}
                       {{--name="email"--}}
                       {{--placeholder="Email address" required>--}}
                {{--@if ($errors->has('email'))--}}
                {{--<span class="text-danger text-left">{{ $errors->first('email') }}</span>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--<div class="mb-3">--}}
                {{--<label for="username" class="form-label">Username</label>--}}
                {{--<input value="{{ old('username') }}"--}}
                       {{--type="text"--}}
                       {{--class="form-control"--}}
                       {{--name="username"--}}
                       {{--placeholder="Username" required>--}}
                {{--@if ($errors->has('username'))--}}
                {{--<span class="text-danger text-left">{{ $errors->first('username') }}</span>--}}
                {{--@endif--}}
            {{--</div>--}}

            {{--<button type="submit" class="btn btn-primary">Save article</button>--}}
            {{--<a href="{{ route('articles.index') }}" class="btn btn-default">Back</a>--}}
        </form>
        <div id="editorjs"></div>

        <button id="save-button" class="btn btn-primary">Create Article</button>
    </div>

</div>
<script>
    const editor = new EditorJS({
        autofocus: true,
        tools: {
            image: {
                class: SimpleImage,
                inlineToolbar: false,
            }
        },
        data: {
            time: 1552744582955,
            blocks: [
                {
                    type: "image",
                    data: {
                        url: "https://cdn.pixabay.com/photo/2017/09/01/21/53/blue-2705642_1280.jpg"
                    }
                }
            ],
            version: "2.11.10"
        }
    });

    const saveButton = document.getElementById('save-button');
    const output = document.getElementById('output');

    saveButton.addEventListener('click', () => {
        editor.save().then( savedData => {
        output.innerHTML = JSON.stringify(savedData, null, 4);
        output.value = JSON.stringify(savedData, null, 4);
        document.getElementById('savearticle').submit();

    })
    })
</script>
@endsection
