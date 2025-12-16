<?php

use Statamic\Facades\Stache;

beforeEach(function () {
    Stache::clear();
});

it('stores unchanged filename', function () {
    $file = $this->uploadTestFileToTestContainer('unchanged-filename.txt');
    expect($file->filename())->toBe('unchanged-filename');
    expect($file->get('original_filename'))->toBe('unchanged-filename');
});

it('stores simple filename', function () {
    $file = $this->uploadTestFileToTestContainer('Simple Filename.txt');
    expect($file->filename())->toBe('simple-filename');
    expect($file->get('original_filename'))->toBe('Simple Filename');
});

it('stores unicode filename', function () {
    $file = $this->uploadTestFileToTestContainer('Long Fílènämē with © Copyright.txt');
    expect($file->filename())->toBe('long-filename-with--copyright');
    expect($file->get('original_filename'))->toBe('Long Fílènämē with © Copyright');
});
