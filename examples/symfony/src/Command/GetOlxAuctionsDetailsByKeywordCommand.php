<?php

declare(strict_types=1);

namespace App\Command;

use Isocapi\ApiClient;
use Isocapi\Source\Olx;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;


#[AsCommand(
    name: 'app:get-olx-auctions-details-by-keyword',
    description: 'Fetches olx auctions details by keyword',
)]
class GetOlxAuctionsDetailsByKeywordCommand extends Command
{
    public function __construct(
        private readonly ApiClient $client,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Fetching olx auctions details by keyword...');

        try {
            $response = $this->client
                ->request(source: new Olx\AuctionsDetailsByKeyword([
                    'keyword' => $input->getArgument('keyword'),
                    'page' => $input->getArgument('page'),
                ]));
        } catch (Throwable $ex) {
            $output->writeln([
                'Something went wrong...',
                '============',
                'Error: ' . $ex->getMessage(),
            ]);
            return Command::FAILURE;
        }


        $output->writeln([
            'Fetching completed',
            '============',
            'Response: ' . $response->json(),
        ]);

        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('keyword', InputArgument::REQUIRED, 'Keyword')
            ->addArgument('page', InputArgument::OPTIONAL, 'Page', 1)
        ;
    }
}
