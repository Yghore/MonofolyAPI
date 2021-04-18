@extends('layouts.app')

@section('title', 'MonofolyAPI')

@section('content')

@extends('layouts.app')

@section('title', 'MonofolyAPI')

@push('js')
   <script>
       function changeId(){document.getElementById("setid").innerHTML = document.getElementById("id").value;}
        function changeTitle(){document.getElementById("settitle").innerHTML = document.getElementById("title").value;}
        function changeButtons()
    {
        btn1 = document.getElementById("button_1");
        btn2 = document.getElementById("button_2");
        btn3 = document.getElementById("button_3");
        numberBtn = parseInt(document.getElementById("number_buttons").value);
        switch (numberBtn) {
            case 1:
                btn1.classList.remove("d-none");
                btn2.classList.add("d-none");
                btn3.classList.add("d-none");
                break;
            case 2:
                btn1.classList.remove("d-none");
                btn2.classList.remove("d-none");
                btn3.classList.add("d-none");
                break;
            case 3:
                btn1.classList.remove("d-none");
                btn2.classList.remove("d-none");
                btn3.classList.remove("d-none");
                break;        
            default:
                btn1.classList.remove("d-none");
                btn2.classList.remove("d-none");
                btn3.classList.remove("d-none");
                break;
        }
    }
    </script> 
@endpush


@section('content')

<input type="text" class="btn btn-sucess">

<div class="row">
    <div class="card col-lg-12">
        <div class="card-header">
            Ajouter une carte : <strong id="settitle"></strong> #<span id="setid"></span>
        </div>
        <div class="card-body">
            <div>
                <div class="row">
                    <div class="mb-2 col-lg-4">
                        <input type="number" id="id" max=40 min=0 placeholder="ID" onchange="changeId()" class="form-control">
                    </div>
                    <div class="mb-2 col-lg-4">
                        <input type="number" max=8 min=0 placeholder="Id pour la case" value=0 class="form-control">
                    </div>
                    <div class="mb-2 col-lg-4">
                        <input type="number" max=3 min=1 value=3 placeholder="Nombre de bouttons" id="number_buttons" onchange="changeButtons()" class="form-control">
                    </div>
                    <div class="mb-2 col-lg-6">
                        <input type="text" id="title" maxlength="10" onchange="changeTitle()" placeholder="Titre" class="form-control">
                    </div>
                    <div class="mb-2 col-lg-6">
                        <input type="text" maxlength="5" placeholder="Quantité" class="form-control">
                    </div>
                    <div class="mb-2  col-lg-12">
                        <textarea name="" id="" cols="30" rows="10" class="form-control" maxlength="150" placeholder="Description de la carte"></textarea>
                    </div>
                    <div class="mb-2  col-lg-4">
                        <input type="text" placeholder="Button #1" id="button_1" maxlength="8" class="form-control">
                    </div>
                    <div class="mb-2  col-lg-4">
                        <input type="text" placeholder="Button #2" id="button_2" maxlength="8" class="form-control">
                    </div>
                    <div class="mb-2  col-lg-4">
                        <input type="text" placeholder="Button #3" id="button_3" maxlength="8" class="form-control">
                    </div>
                    <div class="mb-2 mt-4 col-lg-4">
                        <input type="submit" value="Modifier" class="form-control btn btn-primary">
                    </div>
                </div>
                

            </div>
            
        </div>
    </div>
</div>

@endsection


@endsection