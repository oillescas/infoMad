<div id="{{$evento->id_evento}}" class="evento" itemscope  itemtype="http://schema.org/Event">
    <h2><a itemprop="url"  href="{{route('evento.show', $evento->id_evento)}}"><span itemprop="name">{{$evento['titulo']}}</span></a></h2>
    <div itemprop="description">
        {{$evento['descripcion']}}
    </div>
    <meta  itemprop="startDate" content="{{$evento['fecha_evento']->toDateString()}}T{{$evento['hora_evento']}}"/>
    <div>
     @if($evento['evento_larga_duracion'])
        Del
     @endif
      {{$evento['fecha_evento']->toDateString()}}
      @if($evento['evento_larga_duracion'])
        al {{$evento['fecha_fin_evento']->toDateString()}}
      @endif
    </div>
    <div>A las {{$evento['hora_evento']}}</div>
    <div>
      @if($evento['gratuito'])
        Gratis
      @else
        {{$evento['precio']}}
      @endif</div>

    <div itemprop="location" itemscope itemtype="http://schema.org/EventVenue">
        <meta itemprop="latitude" content="{{$evento['localizacion']['latitud']}}" />
        <meta itemprop="longitude" content="{{$evento['localizacion']['longitud']}}" />
        <a href="/centro/{{$evento['localizacion']['id_instalacion']}}">{{$evento['localizacion']['nombre_instalacion']}}</a>
    </div>
    <div><a href=" {{route('evento.tipo', $evento->tipo)}}">{{$evento->tipo}}</a></div>
    <div class="verMas"><a href="{{$evento['content_url']}}">Ver info</a></div>
</div>