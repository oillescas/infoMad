@extends('app')


@section('content')
    <div class="container">
        <div class="row">
            <div id="map-container" class="col-md-6">
               <div class="mapWrapper">
                  <div id='mapDiv' data-multi="true" data-origen="#listaEventos li"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Eventos</div>

                    <div class="panel-body">
                        <ul id="listaEventos">
                            @foreach ($listaRelacionados as $evento)
                             <li>
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


@section('style');
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/fullcalendar-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css">
    <style>
      #map-container{
        border-left: 15px solid transparent;
      }

      .mapWrapper{

        padding-top: 65%;
        /* margin: 0; */
      }

    </style>
@endsection


@section('scripts')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang-all.js"></script>
    <script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>
    <!-- <script type="text/javascript" src="/js/eventos.js"></script> -->
    <!-- <script type="text/javascript" src="/js/index.js"></script> -->
    <script type="text/javascript" src='{{ elixir("js/index.js") }}'></script>
@endsection
