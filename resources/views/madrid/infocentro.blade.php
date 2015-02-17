@extends('app')
@section('style');
   <style>
      #map-container{
        padding: 15px;
        margin-left: 15px;
        margin-right: 15px;
        margin-bottom: 15px;
      }

      #idMap {
        height: 300px;

      }
    </style>

@endsection
@section('scripts')
<script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0">
</script>
<script type="text/javascript" src="/js/centro.js"></script>
@endsection

@section('content')
    <div class="container">
      <div class="row">
            <div  id="map-container" class="col-md-6">
                <div id="idMap"> </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$infoCentro['nombre']}}</div>

                    <div class="panel-body">
                        <div id="centro" class="centro" data-lat="{{$infoCentro['localizacion']['latitud'] or ''}}" data-lon="{{$infoCentro['localizacion']['longitud'] or ''}}">
                            <h2><a href="/centro/{{$infoCentro['id_entidad']}}">{{$infoCentro['nombre']}}</a></h2>
                            <div>
                                {{$infoCentro['localizacion']['clase_vial'] or ''}}
                                {{$infoCentro['localizacion']['nombre_via'] or ''}},
                                {{$infoCentro['localizacion']['num'] or ''}}
                            </div>
                            <div>{{$infoCentro['localizacion']['distrito'] or ''}}</div>
                            <div>{{$infoCentro['transporte']}}</div>
                            <div>{{$infoCentro['equipamiento']}}</div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Eventos</div>
                    <div class="panel-body">
                        <ul>
                            @foreach ($listaEventos as $evento)
                             <li class="evento">
                                @include('madrid.evento.completo', ['evento' => $evento])
                             </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
