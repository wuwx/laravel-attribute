@extends('layouts.admin_lte')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>属性管理</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools">
                    <a href="{{ route('attribute.content_types.properties.create', $content_type) }}" class="btn btn-default">新增属性</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <th>属性标识</th>
                        <th>属性名称</th>
                        <th width="120"></th>
                    </tr>
                    @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->name }}</td>
                        <td>{{ $property->label }}</td>
                        <td><a href="{{ route('attribute.content_types.properties.edit', [$content_type, $property]) }}">编辑</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="box-footer"></div>
        </div>

    </section>
</div>
@endsection
