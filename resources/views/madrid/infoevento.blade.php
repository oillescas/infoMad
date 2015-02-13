@extends('app')

@section('content')
    <div class="container">
      <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        <ul>
                             <li class="centro">
                               <h2><a href="/evento/{{$infoEvento['id-evento']}}">{{$infoEvento['titulo']}}</a></h2>
                                <div>
                                    {{$infoEvento['descripcion']}}
                                </div>
                                <div>
                                 @if($infoEvento['evento-larga-duracion'])
                                    Del
                                 @endif
                                  {{$infoEvento['fecha-evento']}}
                                  @if($infoEvento['evento-larga-duracion'])
                                    al {{$infoEvento['fecha-fin-evento']}}
                                  @endif
                                </div>
                                <div>{{$infoEvento['hora-evento']}}</div>
                                <div>
                                  @if($infoEvento['gratuito'])
                                    Gratis
                                  @else
                                    {{$infoEvento['precio']}}
                                  @endif</div>
                                   <div><a href="/centro/{{$infoEvento['localizacion']['id-instalacion']}}">{{$infoEvento['localizacion']['nombre-instalacion']}}</a></div>
                                   <div>{{$infoEvento['tipo']}}</div>
                                <!-- {{print_r($infoEvento)}}-->
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
                            @foreach ($listaRelacionados as $evento)
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
                                 <div><a href="/centro/{{$evento['localizacion']['id-instalacion']}}">{{$evento['localizacion']['nombre-instalacion']}}</a></div>
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
