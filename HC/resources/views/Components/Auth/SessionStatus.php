<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;

class SessionStatus extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.auth.session-status');
    }
}
