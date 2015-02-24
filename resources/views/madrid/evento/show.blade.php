@extends('app')


@section('content')
    <div class="container">
      <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        <div class="centro">
                            @include('madrid.evento.completo', ['evento' => $infoEvento])
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
