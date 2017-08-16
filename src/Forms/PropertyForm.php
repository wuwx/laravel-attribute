<?php

namespace Wuwx\LaravelAttribute\Forms;

use Kris\LaravelFormBuilder\Form;

class PropertyForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => '属性标识', 'attr' => ['class' => 'form-control'],
            'rules' => 'required',
        ]);

        $this->add('label', 'text', [
            'label' => '属性名称', 'attr' => ['class' => 'form-control'],
            'rules' => 'required',
        ]);

        $this->add('submit', 'submit', [
            'label' => '提交',
            'attr' => ['class' => 'btn btn-primary'],
        ]);
    }
}
