@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div id="map-container" class="col-md-8">
                <div class="panel panel-default">
                     <div class="mapWrapper">
                      <div id='mapDiv' data-multi="true" data-origen="#listaCentros li"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        <ul id="listaCentros">
                            @foreach ($listaContenidos as $contenido)
                             <li class="centro mapPosition" data-lat="{{$contenido['localizacion']['latitud'] or 0}}" data-lon="{{$contenido['localizacion']['longitud'] or 0}}">
                                @include('madrid.centro.completo', ['centro' => $contenido])
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

<script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0">
</script>
<script type="text/javascript" src='{{ elixir("js/index.js") }}'></script>
<!-- <script type="text/javascript" src="/js/index.js"></script> -->
@endsection