@extends('layouts.app')

@section('content')
<div class="container">
  <div class="content">
    <?php if (count($errors) >0): ?>
      <div class="alert alert-danger">

        <?php foreach ($errors->all() as $error): ?>
          <li>{{ $error }}</li>
        <?php endforeach; ?>

      </div>
    <?php endif; ?>

      <h1>Tambah Quotes</h1>
      <hr>
      <form action="/quotes" method="post">
  {{ csrf_field() }}
          <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" id="usr" name="title">
          </div>
          <div class="form-group">
              <label for="subject">Subject:</label>
              <textarea class="form-control" id="subject" name="subject"></textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-md btn-primary">Submit</button>

          </div>

      </form>
      <a href="/quotes">
      <button type="reset" class="btn btn-md btn-danger">Cancel</button></a>
  </div>
</div>
@endsection
