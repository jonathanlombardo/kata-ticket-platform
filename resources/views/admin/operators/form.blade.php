@extends('layouts.app')

@section('head-title', isset($operator) ? 'Modifica operatore' : 'Aggiungi operatore')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header h3">{{ isset($operator) ? 'Modifica' : 'Aggiungi' }} operatore</div>

          <div class="card-body">

            <form method="POST" action="{{ isset($operator) ? route('admin.operators.update', $operator->id) : route('admin.operators.store') }}">
              @csrf
              @method(isset($operator) ? 'PATCH' : 'POST')

              <div class="row">

              <div class="col-6">
              {{-- Operator first name --}}
                <div class="form-group row">
                  <label for="first_name" class="col-md-3 col-form-label text-md-right">Nome</label>
  
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="first_name" name="first_name" value="{{ isset($operator) ? $operator->first_name : '' }}">
                  </div>
                </div>

                {{-- Operator last name --}}
                <div class="form-group row">
                  <label for="last_name" class="col-md-3 col-form-label text-md-right">Cognome</label>
  
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="last_name" name="last_name" value="{{ isset($operator) ? $operator->last_name : '' }}">
                  </div>
                </div>

               </div>

               <div class="col-6">
                {{-- Email operator --}}
                <div class="form-group row">
                  <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
  
                  <div class="col-md-8">
                    <input class="form-control" type="email" id="email" name="email" value="{{ isset($operator) ? $operator->email : '' }}">
                  </div>
                </div>

                {{-- Input dish-availability --}}
                {{-- <div class="form-group row">
                    <label for="available" class="form-check-label">Disponibile</label>
                    <input type="hidden" name="available" value="0">
                    <input class="form-check-input form-control" id="available" name="available" type="checkbox" value="1" {{ $operator->available ? 'checked' : '' }}>
                </div> --}}

                </div>

                {{-- Submit button --}}
                <div class="form-group row mb-0 pt-4">
                  <div class="col-12 offset-12 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">
                      {{ isset($operator) ? 'Conferma modifica' : 'Conferma' }}
                    </button>
                  </div>
                </div>
              
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
