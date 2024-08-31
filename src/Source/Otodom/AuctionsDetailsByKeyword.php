<?php

declare(strict_types=1);

namespace App\Source\Otodom;

use App\Source\BaseSource;
use Override;

class AuctionsDetailsByKeyword extends BaseSource
{
    #[Override]
    public function url(): string
    {
        return '/otodom/auctions-details-by-keyword/';
    }

    #[Override]
    public function isPaginated(): bool
    {
        return true;
    }
}
