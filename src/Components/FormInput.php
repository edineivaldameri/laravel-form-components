<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormInput extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public string $name;
    public string $label;
    public string $type;
    public bool $floating;
    public bool $required;
    public string $inputmode = 'text';

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        string $type = 'text',
        $bind = null,
        $default = null,
        $language = null,
        bool $required = false,
        bool $showErrors = true,
        bool $floating = false
    ) {
        $this->name       = $name;
        $this->label      = $label;
        $this->type       = $type;
        $this->showErrors = $showErrors;
        $this->floating   = $floating && $type !== 'hidden';
        $this->required = $required;

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        if ($type == 'number') {
            $this->inputmode = 'decimal';
        } else if (in_array($type, ['tel', 'search', 'email', 'url'])) {
            $this->inputmode = $type;
        } else {
            $this->inputmode = 'text';
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
