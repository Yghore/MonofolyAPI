@extends('layouts.app')

@section('title', 'MonofolyAPI')

@section('content')


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste des utilisateurs</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users DB</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataUser" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Pseudonyme</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Grade</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#1</td>
                                            <td>Yghore</td>
                                            <td>Yhgore@gmail.com</td>
                                            <td>31/12/1970 - 00:00</td>
                                            <td>Administration</td>
                                            <td>
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




@endsection


{{-- @push('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
<script>

    $(document).ready(function() {
      $('#dataUser').DataTable();
    });
    
    </script>
@endpush --}}