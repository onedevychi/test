@extends('layouts.app')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
<ui>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
</ui>
</div>
@endif
<form action="{{ route('contact-update-submit', $data->id) }}" method="post">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlTextarea1"><h2>Редактировать</h2></label>
    <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="9" style="width:1000px;" placeholder="Напиши пост">{{$data->message}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Обновить</button>
  <button type="submit" class="btn btn-primary mb-2">Удалить</button>
</form>
@endsection