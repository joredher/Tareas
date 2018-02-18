@extends('app')

@section('content')

    <div id="crud" class="row">
        <div class="col-sm-12 text-center m-auto">
            <h1 class="page-header"> Laravel-Mix/VueJs </h1>
        </div>
        <div class="col-sm-7">
            <div class="text-left m-2">
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create"> Agregar Tarea </a>
            </div>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Tarea</th>
                    <th colspan="2">
                        &nbsp;
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in items">
                    <td width="10px"><span v-text="index + 1"></span></td>
                    <td><span v-text="item.item"></span></td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt text-white"></i></a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-danger btn-sm" @click.prevent="deleteItem(item, index)"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
            @include('create')
        </div>
        <div class="col-sm-5">
            {{--<pre>--}}
                {{--@{{ $data }}--}}
            {{--</pre>--}}
        </div>
    </div>

@endsection