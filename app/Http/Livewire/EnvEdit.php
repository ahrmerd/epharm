<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EnvEdit extends Component
{
    public function save()
    {
        $path = app()->environmentFilePath();
        // dd($path);
        if (file_exists($path)) {
            // $var = $this->varName . '=';
            // $var = 'VONAGE_KEY=';
            // dump($var);
            // dump(preg_match("/VONAGE/m", file_get_contents($path)));
            // if (preg_match("/{$this->varName} . '='/m", file_get_contents($path))) {
            if (env($this->varName)) {
                // if (str_contains(file_get_contents($path), $this->varName . '=')) {
                // dd(file_get_contents($path));
                file_put_contents(
                    $path,
                    str_replace(
                        $this->varName . '=' . getenv($this->varName),
                        $this->varName . '=' . $this->newVal,
                        file_get_contents($path)
                    )
                );
            } else {
                file_put_contents(
                    $path,
                    PHP_EOL . $this->varName . '=' . $this->newVal . PHP_EOL,
                    FILE_APPEND
                );
            }
            $this->varVal = $this->newVal;
        }
        $this->dispatchBrowserEvent('finished');
    }

    public function mount($varName)
    {
        if ($varName != null) {
            $this->varVal = getenv($varName);
            $this->newVal = getenv($varName);
        }
    }

    public function cancel()
    {
        $this->dispatchBrowserEvent('finished');
    }
    public $varName;
    public $varVal;
    public $newVal;

    public function render()
    {
        return view('livewire.env-edit');
    }
}
