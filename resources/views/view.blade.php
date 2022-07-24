@extends('layouts.app')

@section('content')  
<main>
<div class="album py-5 bg-light">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach($data as $el)
      @can('update',$el)
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-body">
          <div class="items-row">
		    <div class="items-text">
            <p class="card-text">
              {{ $el->message }}
            </p>
            </div>
            </div>
              <i>{{ $el->name }}</i>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              @can('view',$el)
              <a href="{{ route('contact-delete', $el->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button></a>
              @endcan  
              <a href="{{ route('contact-data-one', $el->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Детальнее</button></a>
                <small>{{ $el->created_at }}</small>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      @endcan
      @endforeach
    </div>
  </div>
</div>
</main>
<div>
  {{ $data->links() }}
</div>
@endsection