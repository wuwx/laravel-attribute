<?php

namespace Wuwx\LaravelAttribute\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Wuwx\LaravelAttribute\ContentType;
use Wuwx\LaravelAttribute\Property;
use Wuwx\LaravelAttribute\Forms\PropertyForm;

class PropertiesController extends Controller
{
    public function index(ContentType $content_type)
    {
        $properties = $content_type->properties;
        return view('attribute::properties.index', compact('content_type', 'properties'));
    }

    public function edit(ContentType $content_type, Property $property)
    {
        $form = FormBuilder::create(PropertyForm::class, [
            'method' => 'PUT',
            'model' => $property,
            'url' => route('attribute.content_types.properties.update', compact('content_type', 'property')),
        ]);
        return view('attribute::properties.edit', compact('content_type', 'property', 'form'));
    }

    public function update(Request $request, ContentType $content_type, Property $property)
    {
        $form = FormBuilder::create(PropertyForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            $property->update($request->all());
            return redirect()->route('attribute.content_types.properties.index', $content_type);
        }
    }

    public function create(ContentType $content_type)
    {
        $form = FormBuilder::create(PropertyForm::class, [
            'method' => 'POST',
            'url' => route('attribute.content_types.properties.store', $content_type),
            'class' => "",
        ]);
        return view('attribute::properties.create', compact('form'));
    }

    public function store(Request $request, ContentType $content_type)
    {
        $form = FormBuilder::create(PropertyForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            $content_type->properties()->create($request->all());
            return redirect()->route('attribute.content_types.properties.index', $content_type);
        }
    }

    public function destroy(ContentType $content_type, Property $property)
    {
        $property->delete();
        return redirect()->route('attribute.content_types.properties.index', $content_type);
    }
}
