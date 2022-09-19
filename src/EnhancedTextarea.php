<?php

declare(strict_types=1);

namespace Ardenthq\EnhancedTextarea;

use Laravel\Nova\Fields\Textarea;

class EnhancedTextarea extends Textarea
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'enhanced-textarea';

    /**
     * The number of rows used for the textarea.
     *
     * @var int|null
     */
    public $maxLength = null;

    public function maxLength(int $maxLength): self
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'maxLength' => $this->maxLength,
        ]);
    }
}
