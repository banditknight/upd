<?php

namespace App\Traits;

use App\Contracts\FormRequestInterface;
use Illuminate\Support\Str;

trait FormRequestDeciderTrait
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return $this->resolveFormRequest()['rules'];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return $this->resolveFormRequest()['messages'];
    }

    public function resolveFormRequest()
    {
        $route = request()->route();

        $data['messages'] = [];
        $data['rules'] = [];

        if (!isset($route[1]['model'])) {
            return $data;
        }

        $model = $route[1]['model'];

        $instanceModel = new $model;

        $data['messages'] = method_exists($instanceModel, 'getMessages') ? $instanceModel->getMessages() : [];
        $data['rules'] = method_exists($instanceModel, 'getRules') ? $instanceModel->getRules() : [];

        $formRequestNameSpace = Str::replaceFirst('Models', 'Http\Requests', $model);

        $method = $route[1]['method'];

        if (
            method_exists($instanceModel, 'getAllowedMethod') &&
            !in_array($method, $instanceModel->getAllowedMethod(), false)
        ) {
            $data['messages'] = [];
            $data['rules'] = [];

            return $data;
        }

        $method = ucfirst($method);
        $suffix = 'Request';

        $formRequestClass = sprintf('%s\%s%s', $formRequestNameSpace, $method, $suffix);

        if (!class_exists($formRequestClass)) {
            return $data;
        }

        /** @var FormRequestInterface $instanceFormRequestClass */
        $instanceFormRequestClass = new $formRequestClass();

        $data['messages'] = $instanceFormRequestClass->messages();
        $data['rules'] = $instanceFormRequestClass->rules();

        return $data;
    }
}
