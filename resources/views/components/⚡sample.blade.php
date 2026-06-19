<?php

use Livewire\Component;
use Livewire\Attributes\On;

new class extends Component
{
    //

    #[On('echo:publicChannel,Test')]
    public function dump()
    {
        dd('dump');
    }
};
?>

<div>
    {{-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca --}}
    Sample
</div>
