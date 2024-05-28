@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="text-center">Categorie</h1>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">Categoria</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categories as $cat)
          <tr>
            <td>{{ $cat->name }}</td>
            <td class="text-end">
              <a class="me-3" href="{{ route('admin.categories.edit', $cat) }}"><i class="fa-regular fa-pen-to-square"></i></a>
              {{-- <a class="me-3" href="{{ route('admin.categories.destroy', $cat) }}"><i class="fa-solid fa-trash"></i></a> --}}
            </td>
          </tr>
        @empty
          <td colspan="100%">No categories available</td>
        @endforelse


      </tbody>
    </table>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dettagli Ticket</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categoria</h5>
                            <p class="card-text">{{ $ticket->category->name }}</p>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Data apertura</h5>
                            <p class="card-text">{{ $ticket->date }}</p>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Operatore</h5>
                            <p class="card-text">{{ $ticket->operator->first_name }} {{ $ticket->operator->last_name}}</p>
                            <pre class="card-text">{{ $ticket->operator->email}}  </pre>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Priorità</h5>
                            <p class="card-text">{{ $ticket->priority->name }}</p>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Stato</h5>
                            <p class="card-text">{{ $ticket->status->name }}</p>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Titolo</h5>
                            <p class="card-text">{{ $ticket->title }}</p>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Descrizione</h5>
                            <p class="card-text">{{ $ticket->description }}</p>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Note</h5>
                            <p class="card-text">{{ $ticket->notes }}</p>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary me-3">
                            Indietro
                        </a>
                        <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-primary">
                            Modifica
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
  </div>
@endsection
