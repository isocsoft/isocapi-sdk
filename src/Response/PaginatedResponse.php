<?php

declare(strict_types=1);

namespace Isocapi\Response;

class PaginatedResponse extends BaseResponse
{
    public function totalItems(): int
    {
        return $this->data()['totalItems'];
    }

    public function totalPages(): int
    {
        return $this->data()['totalPages'];
    }

    public function itemsOnPage(): int
    {
        return $this->data()['itemsOnPage'];
    }

    public function results(): array
    {
        return $this->data()['results'];
    }
}
