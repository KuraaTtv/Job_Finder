@props(['tagsCsv'])

@php
// explode explode() retourne un tableau de chaînes de caractères, chacune d'elle étant une 
//sous-chaîne du paramètre string extraite en utilisant le séparateur separator.
//we have data in db separte with ',' and 
$tags = explode(',', $tagsCsv);  
@endphp
<ul class="flex">
  @foreach($tags as $tag)
  <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
    <a href="/?tag={{$tag}}">{{$tag}}</a>
  </li>
  @endforeach
</ul>