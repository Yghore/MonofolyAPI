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
                                            <th>Type</th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Boutons</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>5</td>
                                            <td>0</td>
                                            <td>LuckyCard</td>
                                            <td>Carte chance</td>
                                            <td>Enlève 8 vêtements ou bois de l'alcool à bruler !, sinon tu peux aussi sauter dans le vide ! mais attention c'est minimum trois mètres ah ah</td>
                                            <td>
                                                (3)
                                                <a href="#" class="btn btn-light">
                                                    <span class="text">Boire</span>
                                                </a>
                                                <a href="#" class="btn btn-light">
                                                    <span class="text">Sauter</span>
                                                </a>
                                                <a href="#" class="btn btn-light">
                                                    <span class="text">Courir</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="#" class="btn btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection


