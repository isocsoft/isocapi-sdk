<?php

declare(strict_types=1);

namespace Isocapi\Source\Vinted;

use Isocapi\Source\BaseSource;
use Override;

class AuctionsDetailsByKeyword extends BaseSource
{
    #[Override] 
    public function url(): string
    {
        return '/vinted/auctions-details-by-keyword/';
    }

    #[Override]
    public function isPaginated(): bool
    {
        return true;
    }
}
