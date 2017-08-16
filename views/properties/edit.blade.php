@extends('layouts.admin_lte')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>属性管理</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    编辑属性
                </div>
                <div class="box-tools">
                    {!! Form::open(['route' => ['attribute.content_types.properties.destroy', $content_type, $property], 'method' => 'DELETE']) !!}
                    {!! Form::submit('删除', ['class' => 'btn btn-default', 'onclick' => "javascript:return confirm('确定要删除吗？');"]); !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="box-body">
                {!! form($form) !!}
            </div>
        </div>
    </section>
</div>
@endsection
