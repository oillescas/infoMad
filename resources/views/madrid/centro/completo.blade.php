<div class="centro" itemscope itemtype="http://schema.org/CivicStructure">
    <meta itemprop="latitude" content="{{$centro['localizacion']['latitud'] or 0}}" />
    <meta itemprop="longitude" content="{{$centro['localizacion']['longitud'] or 0 }}" />
    <h2><a href="/centro/{{$centro->id_entidad}}"><span  itemprop="name">{{$centro->nombre}}</span></a></h2>
    <div class="contenidoExtendido">
      <div>
        {{$centro['localizacion']['clase_vial'] or ''}}
        {{$centro['localizacion']['nombre_via'] or ''}},
        {{$centro['localizacion']['num'] or ''}}
      </div>
      <div>{{$centro['localizacion']['distrito'] or ''}}</div>
      <div>{{$centro['transporte']}}</div>
      <div>{{$centro['equipamiento']}}</div>
    </div>
</div>