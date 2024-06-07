<?php

namespace App\View\Components;

use App\Models\Contact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactCard extends Component
{
    /**
     * Create a new component instance.
     */
public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.contact-card');
    }
}
