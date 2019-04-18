
@extends('layouts.app')

@section('content')
<div class="container">





              <div class="jumbotron">
                <h1>{{$quote->title}}</h1>
                <h3>{{$quote->subject}}</h3>

                <p>ditulis oleh {{ $quote->user->name}}</p>
                <a href="/quotes">
                <button class="btn btn-primary" type="submit" name="button">back</button>
                </a>
                <?php if ($quote->IsOwner()): ?>

                  <a href="/quotes/{{$quote->id}}/edit" class=" btn btn-sm btn-primary">Edit</a>
                  <form action="/quotes/{{$quote->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                      <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                  </form>

                <?php endif; ?>
              </div>



</div>
@endsection
