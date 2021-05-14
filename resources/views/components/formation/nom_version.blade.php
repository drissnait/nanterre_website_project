@php
$defaultStyleLibelle = "";
$defaultStyleVet = "text-smaller";

if(!isset($styleLibelle)){
    $styleLibelle = $defaultStyleLibelle;
}

if(!isset($styleVet)){
    $styleVet = $defaultStyleVet;
}
@endphp

<span class="{{ $styleLibelle }}">{{ $libelle }}</span> <span class="{{ $styleVet }}">v{{ $vet }}</span>
