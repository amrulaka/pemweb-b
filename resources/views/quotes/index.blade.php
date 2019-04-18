
@extends('layouts.app')

@section('content')
<div class="container">


                <div class="card-header">Quotes</div><br>
                <a href="/quotes/create">
                <button class="btn btn-default" type="submit" name="button">tambah quote</button></a>

                <div class="card-body">
                  @if(Session::has('alert-success'))
                      <div class="alert alert-success">
                          <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                      </div>
                  @endif
                </div>
                <div class="row">
                  <?php foreach ($data as $x): ?>

                    <div class="col-md-4">

                      <div class="thumbnail">
                        <div class="caption">{{$x->title}}</div>
                        <p><a href="/quotes/{{$x->slug}}" class="btn btn-primary"> lihat kutipan </a></p>

                      </div>

                    </div>


                  <?php endforeach; ?>
                </div>



</div>
@endsection
