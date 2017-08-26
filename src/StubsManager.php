<?php

namespace OwenMelbz\LaravelStubs;

use View;
use Exception;

class StubsManager
{

    protected $name;

    protected $type;

    protected $stubs;

    public function __construct()
    {
        $this->stubs = collect(
            config('template_stubs')
        );
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->stub = $this->stubs->first(function ($stub) use ($type) {
            return $type == $stub['name'];
        });

        if (!$this->stub) {
            throw new Exception('Cannot find a stub with the name of ' . $type);
        }

        $this->type = $type;

        return $this;
    }

    public function convertStubs($forceOverwrite = false)
    {
        // We see if the user has a custom stub
        $userStub = resource_path('vendor/stubs/' . $this->stub['stub']);
        $vendorStub = __DIR__ . '/stubs/' . $this->stub['stub'];

        $stubPath = file_exists($userStub) ? $userStub : $vendorStub;

        // If we cant find the stub at all simply fail.
        if (!file_exists($stubPath)) {
            throw new Exception ('Could not find stub in path ' . $stubPath);
        }

        // Try be helpful and create the output folder.
        if (!file_exists($this->stub['output_path'])) {
            mkdir($this->stub['output_path'], 0755, true);
        }

        // If the file already exists, sugest the user to delete it first.
        $extension = pathinfo($stubPath, PATHINFO_EXTENSION);

        if (str_contains($this->stub['stub'], '.blade.php')) {
            $extension = 'blade.php';
        }

        $outputFile = rtrim($this->stub['output_path'], '/') . '/' . $this->getName() . '.' . $extension;

        if ($forceOverwrite === false && file_exists($outputFile)) {
            throw new Exception($outputFile . ' already exists, consider trying with "--force" to overwrite.');
        }

        // Set up the new file
        $stubContent = file_get_contents($stubPath);

        if (!isset($this->stub['placeholder'])) {
            $this->stub['placeholder'] = '@placeholder';
        }

        $newContent = str_replace($this->stub['placeholder'], $this->getName(), $stubContent);

        if (!file_put_contents($outputFile, $newContent)) {
            throw new Exception('Could not write to ' . $outputFile);
        }

        return $outputFile;
    }

}