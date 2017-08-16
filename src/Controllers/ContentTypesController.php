<?php

namespace Wuwx\LaravelAttribute\Controllers;

use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Wuwx\LaravelAttribute\ContentType;
use Wuwx\LaravelAttribute\Forms\ContentTypeForm;

class ContentTypesController extends Controller
{
    public function index()
    {
        $content_types = ContentType::all();
        return view('attribute::content_types.index', compact('content_types'));
    }

    public function create()
    {
        $form = FormBuilder::create(ContentTypeForm::class, [
            'method' => 'POST',
            'url' => route('attribute.content_types.store'),
            'class' => "",
        ]);
        return view('attribute::content_types.create', compact('form'));
    }

    public function store(Request $request)
    {
        $form = FormBuilder::create(ContentTypeForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            ContentType::create($request->all());
            return redirect()->route('attribute.content_types.index');
        }
    }

    public function edit(ContentType $content_type)
    {
        $form = FormBuilder::create(ContentTypeForm::class, [
            'method' => 'PUT',
            'model' => $content_type,
            'url' => route('attribute.content_types.update', compact('content_type')),
        ]);
        return view('attribute::content_types.edit', compact('content_type', 'form'));
    }

    public function update(Request $request, ContentType $content_type)
    {
        $form = FormBuilder::create(ContentTypeForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            $content_type->update($request->all());
            return redirect()->route('attribute.content_types.index');
        }
    }

    public function destroy(ContentType $content_type)
    {
        $content_type->delete();
        return redirect()->route('attribute.content_types.index');
    }
}
