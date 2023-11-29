<?php

namespace App\View\Components\Profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
    /**
     * Create a new component instance.
     */
    public string $photo;
    public function __construct($photo)
    {
        if (is_null($photo)) {
            $this->photo = url('assets/images/users/home-user.png');
        } else {
            $this->photo = url('storage/avatars/128x128-'.$photo);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile.image');
    }
}
