<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormLabel extends Component
{
    public string $label;
    public string $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label = '', bool $required = false)
    {
        $this->label = $label;
        $this->required = $required;
    }
}
