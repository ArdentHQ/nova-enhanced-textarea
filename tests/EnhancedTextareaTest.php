<?php

declare(strict_types=1);

use Ardenthq\EnhancedTextarea\EnhancedTextarea;

it('creates an instance', function () {
    $field = new EnhancedTextarea('content');

    $field->maxLength(100);

    expect($field->component)->toBe('enhanced-textarea');

    expect($field->jsonSerialize())->toMatchArray([
        'uniqueKey' => 'content-default-enhanced-textarea',
        'attribute' => 'content',
        'maxLength' => 100,
        'component' => 'enhanced-textarea',
    ]);
});

it('defines the max length', function () {
    $field = new EnhancedTextarea('content');

    expect($field->maxLength)->toBe(null);

    $field->maxLength(100);

    expect($field->maxLength)->toBe(100);
});
