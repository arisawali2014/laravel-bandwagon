<?php

namespace Bndwgn\Bandwagon\View\Components;

use Bndwgn\Bandwagon\Bandwagon;
use Illuminate\View\Component;

class Renderer extends Component
{
    public $classSnackbar = 'notiforder-snackbar';

    public $classMessage = 'notiforder-message';

    public $classTitle = 'notiforder-text notiforder-title';

    public $classSubtitle = 'notiforder-text notiforder-subtitle';

    public $classTime = 'notiforder-text notiforder-time';

    public $classImage = 'notiforder-image';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        String $classSnackbar = 'notiforder-snackbar',
        String $classMessage = 'notiforder-message',
        String $classTitle = 'notiforder-text notiforder-title',
        String $classSubtitle = 'notiforder-text notiforder-subtitle',
        String $classTime = 'notiforder-text notiforder-time',
        String $classImage = 'notiforder-image'
    ) {
        $this->classSnackbar = $classSnackbar;
        $this->classMessage = $classMessage;
        $this->classTitle = $classTitle;
        $this->classSubtitle = $classSubtitle;
        $this->classTime = $classTime;
        $this->classImage = $classImage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('vendor.bandwagon.renderer', [
            'bandwagonScriptVariables' => Bandwagon::scriptVariables(),
        ]);
    }
}
