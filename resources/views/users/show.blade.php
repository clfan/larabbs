@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

<div class="row">

    <div class="col-lg-3 com-md-3 hidden-sm hidden-xs user-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <div align="center">
                        <img src="https://camo.githubusercontent.com/76cf64f8c548080c14b98cb217dde659b1f568c2/68747470733a2f2f312e67726176617461722e636f6d2f6176617461722f34366232646362303936353837623732363339643061363139633361613631633f643d68747470732533412532462532466173736574732d63646e2e6769746875622e636f6d253246696d6167657325324667726176617461727325324667726176617461722d757365722d3432302e706e6726723d7826733d3732" class="thumbnail img-responsive" width="300px" height="300px">
                    </div>

                    <div class="media-body">
                        <hr>
                        <h4><strong>个人简介</strong></h4>
                        <p> You are oK! </p>
                        <hr>
                        <h4><strong>注册于</strong></h4>
                        <p>January 01 1901</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <span>
                    <h1 class="panel-title pull-left" style="font-size:30px;">
                        {{ $user->name }}
                        <small>{{ $user->email }}</small>
                    </h1>
                </span>
            </div>
        </div>

        <hr>

        {{-- 用户发布的内容 --}}
        <div class="panel panel-default">
            <div class="panel-body">
                No DATA Yet !  lol
            </div>
        </div>
    </div>
</div>
@stop
