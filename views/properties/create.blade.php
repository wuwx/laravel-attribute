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
                    新增属性
                </div>
            </div>
            <div class="box-body">
                {!! form($form) !!}
            </div>
        </div>
    </section>
</div>
@endsection
