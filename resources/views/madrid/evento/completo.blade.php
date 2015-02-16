<div class="evento" itemscope  itemtype="http://schema.org/Event">
    <h2><a itemprop="url"  href="/evento/{{$evento['id-evento']}}"><span itemprop="name">{{$evento['titulo']}}</span></a></h2>
    <div itemprop="description">
        {{$evento['descripcion']}}
    </div>
    <meta  itemprop="startDate" content="{{Carbon::parse($evento['fecha-evento'])->toDateString()}}"/>
    <div>
     @if($evento['evento-larga-duracion'])
        Del
     @endif
      {{Carbon::parse($evento['fecha-evento'])->toDateString()}}
      @if($evento['evento-larga-duracion'])
        al {{Carbon::parse($evento['fecha-fin-evento'])->toDateString()}}
      @endif
    </div>
    <div>A las {{$evento['hora-evento']}}</div>
    <div>
      @if($evento['gratuito'])
        Gratis
      @else
        {{$evento['precio']}}
      @endif</div>
     <div><a href="/centro/{{$evento['localizacion']['id-instalacion']}}">{{$evento['localizacion']['nombre-instalacion']}}</a></div>
    <div>{{$evento['tipo']}}</div>
    <div class="verMas"><a href="{{$evento['content-url']}}">Ver info</a></div>
</div>