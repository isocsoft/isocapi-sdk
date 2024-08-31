<?php

declare(strict_types=1);

namespace App\Source\Olx;

use App\Source\BaseSource;
use Override;

class AuctionDetailsByURL extends BaseSource
{
    #[Override]
    public function url(): string
    {
        return '/olx/auction-details-by-url/';
    }

    #[Override] 
    public function isPaginated(): bool
    {
        return false;
    }
}
