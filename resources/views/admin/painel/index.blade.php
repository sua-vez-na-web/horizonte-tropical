@extends('layouts.admin')


{{--@section('content_header')--}}
{{--    <h1>--}}
{{--        Apartamentos--}}

{{--    </h1>--}}
{{--    <ol class="breadcrumb">--}}
{{--        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
{{--        <li><a href="{{route('apartamentos.index')}}">Apartamentos</a></li>--}}
{{--        <li class="active">Lista</li>--}}
{{--    </ol>--}}

{{--@stop--}}


@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$aptos_alugados}}</h3>

                    <p>Alugados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="{{route('apartamentos.index')}}" class="small-box-footer">
                    Mais Informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$aptos_disponiveis}}</h3>

                    <p>Disponíveis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('apartamentos.index')}}" class="small-box-footer">
                    Mais Informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$visitas ?? 0}}</h3>

                    <p>Visitantes Presentes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('visitas.index')}}" class="small-box-footer">
                    Mais Informações<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$correspondencias ?? 0}}</h3>

                    <p>Correspondências a entregar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{route('correspondencias.index')}}" class="small-box-footer">
                    Mais Informações<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>

@endsection
