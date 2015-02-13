@extends('app')

@section('content')
    <div class="container">
      <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$infoCentro['nombre']}}</div>

                    <div class="panel-body">
                        <ul>
                             <li class="centro" data-lat="{{$infoCentro['localizacion']['latitud'] or ''}}" data-lon="{{$infoCentro['localizacion']['longitud'] or ''}}">
                                <h2><a href="/centro/{{$infoCentro['id-entidad']}}">{{$infoCentro['nombre']}}</a></h2>
                                <div>
                                    {{$infoCentro['localizacion']['clase-vial'] or ''}}/
                                    {{$infoCentro['localizacion']['nombre-via'] or ''}},
                                    {{$infoCentro['localizacion']['num'] or ''}}
                                </div>
                                <div>{{$infoCentro['localizacion']['distrito'] or ''}}</div>
                                <div>{{$infoCentro['transporte']}}</div>
                                <!-- {{print_r($infoCentro)}}-->
                             </li>
                        </ul>
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
                                <h2><a href="/evento/{{$evento['id-evento']}}">{{$evento['titulo']}}</a></h2>
                                <div>
                                    {{$evento['descripcion']}}
                                </div>
                                <div>
                                 @if($evento['evento-larga-duracion'])
                                    Del
                                 @endif
                                  {{$evento['fecha-evento']}}
                                  @if($evento['evento-larga-duracion'])
                                    al {{$evento['fecha-fin-evento']}}
                                  @endif
                                </div>
                                <div>{{$evento['hora-evento']}}</div>
                                <div>
                                  @if($evento['gratuito'])
                                    Gratis
                                  @else
                                    {{$evento['precio']}}
                                  @endif</div>
                                   <div>{{$evento['tipo']}}</div>
                                <!-- {{print_r($evento)}}-->
                             </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
