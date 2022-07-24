@extends('layouts.app')

@section('content')
  <main>
<div class="album py-5 bg-light">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-body">
            <p class="card-text">
              {{ $data->message }}
            </p>
              <i>{{ $data->name }}</i>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ route('contact-update', $data->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Редактировать</button></a>
                <small>{{ $data->created_at }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<div>
</div>
@endsection