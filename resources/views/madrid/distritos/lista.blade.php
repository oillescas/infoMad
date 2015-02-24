@extends('app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Distritos de Madrid</div>

                    <div class="panel-body">
                        <ul>
                            @foreach ($listaDistritos as $distrito)
                             <li>
                                <a href="/distritos/{{$distrito}}">{{$distrito}}</a>
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


@endsection


@section('scripts')

@endsection
