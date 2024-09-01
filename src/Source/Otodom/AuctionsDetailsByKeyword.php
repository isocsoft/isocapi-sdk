<?php

declare(strict_types=1);

namespace Isocapi\Source\Otodom;

use Isocapi\Source\BaseSource;
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
