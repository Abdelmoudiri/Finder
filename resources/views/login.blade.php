@extends('layouts')
@section('title','Login')
@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Login</h1>
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif

        </div>
        <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-xl-3 " style="width: 500px">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="check_me">
                <label class="form-check-label" for="exampleCheck1"  >Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
