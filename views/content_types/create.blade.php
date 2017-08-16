@extends('layouts.admin_lte')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>类型管理</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    新增类型
                </div>
            </div>
            <div class="box-body">
                {!! form($form) !!}
            </div>
        </div>
    </section>
</div>
@endsection
