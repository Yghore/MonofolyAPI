@extends('layouts.app')

@section('title', 'MonofolyAPI')

@section('content')
@extends('layouts.app')

@section('title', 'MonofolyAPI')

@push('js')
    
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
<script>

    $(document).ready(function() {
      $('#dataspecialcard').DataTable();
    });
    
    </script>
@endpush


@section('content')


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Cartes spéciaux</h1>
                    <p class="mb-4">Ici tu peux Modifier les cartes spéciaux du monofoly.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Specials Cards</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataspecialcard" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Cases</th>
                                            <th>ID pour la cases</th>
                                            <th>Nom</th>
                                            <th>Quantité</th>
                                            <th>Description</th>
                                            <th>Boutons</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cards as $card)
                                        <tr>
                                            <td>{{ $card->id }}</td>
                                            <td>{{ $card->case }}</td>
                                            <td>{{ $card->n_case }}</td>
                                            <td>{{ $card->title }}</td>
                                            <td>{{ $card->quantity }}</td>
                                            <td>{{ $card->desc_case }}</td>
                                            <td>
                                                ( {{ $card->n_buttons }} )
                                                @php 
                                                    $buttons = explode(",", $card->buttons);
                                                @endphp
                                                @for ($i = 0; $i < $card->n_buttons; $i++)
                                                    <a href="#" class="btn btn-light">
                                                        <span class="text">{{ $buttons[$i] }}</span>
                                                    </a>
                                                @endfor

                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{ route('cases.edit', ['classic', $card->id],) }}" class="btn btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection




@endsection