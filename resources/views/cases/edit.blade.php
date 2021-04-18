@extends('layouts.app')

@section('title', 'MonofolyAPI')

@push('js')
    
<script>

    function displayNoneCase(btnsR, btns)
    {
        btns[0].classList.add("d-none");
        btns[1].classList.add("d-none");
        btns[2].classList.add("d-none");
        btnsR.forEach(element => {
            element.classList.remove("d-none");
        });
        
    }

    function changeButtons()
    {
        var btns = [];
        for (let index = 0; index < 3; index++) 
        {
            btns.push(document.getElementById("button_" + (index + 1)));
        }

        numberBtn = parseInt(document.getElementById("number_buttons").value);
        
        switch (numberBtn) {
            case 1:
                displayNoneCase([btns[0]], btns)
                break;
            case 2:
                displayNoneCase([btns[0], btns[1]], btns)
                break;
            case 3:
                displayNoneCase([btns[0], btns[1], btns[2]], btns)
                break;        
            default:
                displayNoneCase([btns[0], btns[1], btns[2]], btns)
                break;
        }
    }

    (function() {
        changeButtons()

    })();
</script>

@endpush

@section('content')

{{-- ID
CASES 
ID FOR CASES 
TITLE 
DESC 
NUMBER OF BUTTONS 
BUTTONS --}}



<div class="row">
    <div class="card col-lg-12">
        <div class="card-header">
            Editer la carte : "La chance !" #1-5
        </div>
        <div class="card-body">
            <div>
                <div class="row">
                   @isset($card)
                        <div class="mb-2 col-lg-4">
                            <input type="number" disabled max=40 min=0 placeholder="Case" value="{{ $card->case }}" class="form-control">
                        </div>
                        <div class="mb-2 col-lg-4">
                            <input type="number" disabled max=8 min=0 placeholder="Id pour la case" value="{{ $card->n_case }}" class="form-control">
                        </div>
                        <div class="mb-2 col-lg-4">
                            <input type="number" max=3 min=1 value="{{ $card->n_buttons }}" placeholder="Nombre de bouttons" id="number_buttons" onchange="changeButtons()" class="form-control">
                        </div>
                        <div class="mb-2 col-lg-6">
                            <input type="text" placeholder="Titre" value="{{ $card->title }}" class="form-control">
                        </div>
                        <div class="mb-2 col-lg-6">
                            <input type="text" maxlength="5" value="{{ $card->quantity }}" placeholder="Quantité" class="form-control">
                        </div>
                        <div class="mb-2  col-lg-12">
                            <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Description de la carte">{{ $card->desc_case }}</textarea>
                        </div>
                        @php 
                            $buttons = explode(",", $card->buttons);
                        @endphp
                        @for ($i = 0; $i < 3; $i++)
                            <div class="mb-2  col-lg-4">
                                @if (!empty($buttons[$i]))
                                    <input type="text" placeholder="Button #{{ $i + 1}}" id="button_{{ $i + 1}}" class="form-control" value="{{ $buttons[$i] }}">
                                @else
                                <input type="text" placeholder="Button #{{ $i + 1}}" id="button_{{ $i + 1}}" class="form-control">
                                @endif
                                
                            </div>

                        @endfor
                        <div class="mb-2 mt-4 col-lg-4">
                            <input type="submit" value="Modifier" class="form-control btn btn-primary">
                        </div>
                   @endisset
                </div>
                

            </div>
            
        </div>
    </div>
</div>

@endsection