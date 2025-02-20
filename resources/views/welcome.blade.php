@extends('layouts')
@section('title','Home page')
@section('content')

@foreach($annonces as $ann)
    <div class="card">

        <h3>{{$ann->titre}}</h3>
        <p>{{$ann->description}}</p>
        <div>
            <p>{{$ann->lieu}}</p>
            <p>{{$ann->date}}</p>
        </div>

    </div>
@endforeach
<!-- Bootstrap JS and dependencies -->
@endsection
