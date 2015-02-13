@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id='mapDiv'></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        <ul id="listaCentros">
                            @foreach ($listaContenidos as $contenido)
                             <li class="centro" data-lat="{{$contenido['localizacion']['latitud'] or 0}}" data-lon="{{$contenido['localizacion']['longitud'] or 0}}">
                                <h2><a href="/centro/{{$contenido['id-entidad']}}">{{$contenido['nombre']}}</a></h2>
                                <div class="contenidoExtendido">
                                  <div>
                                    {{$contenido['localizacion']['clase-vial']}}/
                                    {{$contenido['localizacion']['nombre-via'] or ''}},
                                    {{$contenido['localizacion']['num'] or ''}}
                                  </div>
                                  <div>{{$contenido['localizacion']['distrito'] or ''}}</div>
                                  <div>{{$contenido['transporte']}}</div>
                                </div>
                                <!-- {{print_r($contenido)}}-->
                             </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style');

<link rel="stylesheet" type="text/css" href="/css/index.css">

@endsection


@section('scripts')

<script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0">
</script>
<script type="text/javascript" src="/js/index.js"></script>
@endsection