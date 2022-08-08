@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        @auth
        <h1>Dashboard</h1>

        <p class="lead">Only authenticated users can access this section.</p>
        @endauth

        @guest
        @endguest
    </div>
     <div class="bg-light p-4 rounded">
            <h1>Articles</h1>
            <div class="lead">
            </div>
            <style>
                .card {
                  /* Add shadows to create the "card" effect */
                  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                  transition: 0.3s;
                  width: 20%;
                  display:inline-block;
                  margin:5px;
                }

                /* On mouse-over, add a deeper shadow */
                .card:hover {
                  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                }

                /* Add some padding inside the card container */
                .container {
                  padding: 2px 16px;
                  font-color:blue;
                }
            </style>
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>


                    @foreach($articles as $article)

                           <div class="card" >

                                 <div class="container">
                                   <p style="color:blue;">

                                   @php
                                   echo substr($article->title, 0, 10);echo "..."
                                   @endphp

                                   </p>
                                 </div>
                                 <img src={{url('/images/article.jpg')}} alt="Avatar" style="width:100%">
                                  {!! Form::open(['method' => 'GET','route' => ['articles.show', $article->id],'style'=>'display:inline']) !!}
                                  {!! Form::submit('Read', ['class' => 'btn btn-success btn-sm']) !!}
                                  {!! Form::close() !!}


                           </div>





                    @endforeach

            <div class="d-flex">
            </div>

        </div>
@endsection
