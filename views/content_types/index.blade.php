@extends('layouts.admin_lte')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>内容类型</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools">
                    <a href="{{ route('attribute.content_types.create') }}" class="btn btn-default">新增类型</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <th>名称</th>
                        <th></th>
                        <th width="120"></th>
                    </tr>
                    @foreach($content_types as $content_type)
                    <tr>
                        <td>{{ $content_type->name }}</td>
                        <td><a href="{{ route('attribute.content_types.properties.index', $content_type) }}">Properties ({{ $content_type->properties()->count() }})</a></td>
                        <td><a href="{{ route('attribute.content_types.edit', $content_type) }}">编辑</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="box-footer"></div>
        </div>

    </section>
</div>
@endsection
