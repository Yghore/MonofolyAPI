@extends('layouts.app')

@section('title', 'MonofolyAPI')


@section('content')



<div class="row">
    <div class="card col-lg-12">
        @if(session('success'))
        <div class="card mb-4 py-3 border-bottom-success" style="background-color=#f8d7da;">
            <div class="card-body">
                
                   <h3 class="text-gray-900">{{ session('success') }}</h3>
            </div>
        </div>
        @endif

        <div class="card-header">
            Ajouter une version
        </div>
        <div class="card-body">
            <div>
                
                <form method="POST" class="form-group">
                    @csrf
                    <div class="row">
                        <div class="mb-2 col-lg-12">
                            <label for="version">Nom de la version des cartes :</label>
                            <input type="text" id="version" name="version" max=10 min=0 placeholder="Id de la verion" onchange="changeId()" class="form-control">
                        </div>
                        <div class="mb-2 col-lg-12">
                            <label for="desc_version">Description de la nouvelle version : </label>
                            <textarea name="desc_version" id="desc_version" cols="30" rows="5" maxlength="30" class="form-control" placeholder="description de la version"></textarea>
                        </div>
                        <div class="mb-2 col-lg-12">
                            <input id="s2" type="checkbox" name="obligatory" class="switch" checked>
                            <label for="s2">Version Obligatoire ?</label>
                        </div>
                        <div class="mb-2 col-lg-12">
                            <input type="submit" class="form-control btn btn-primary" value="Envoyer la mise à jour">
                        </div>
                    </div>
                </form>
            
            
        </div>
    </div>
    </div>
</div>

@endsection