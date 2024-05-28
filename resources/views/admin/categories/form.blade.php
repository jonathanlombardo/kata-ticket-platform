@extends('layouts.app')

@section('head-title', isset($cat) ? 'Aggiorna categoria' : 'Crea categoria')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ isset($cat) ? 'Aggiorna' : 'Crea' }} categoria</div>

          <div class="card-body">

            <form method="POST" action="{{ isset($cat) ? route('admin.categories.update', $cat->id) : route('admin.categories.store') }}">
              @csrf
              @method(isset($cat) ? 'PATCH' : 'POST')


              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" id="name" name="name" value="{{ isset($cat) ? $cat->name : '' }}">
                </div>
              </div>


              <div class="form-group row mb-0 pt-4">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ isset($cat) ? 'Aggiorna' : 'Crea' }} categoria
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
