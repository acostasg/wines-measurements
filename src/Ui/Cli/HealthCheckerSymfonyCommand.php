<?php

declare(strict_types=1);

namespace IsEazy\WinesMesasurements\Ui\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HealthCheckerSymfonyCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('wines-mesasurements:health-checker')
            ->setDescription('Wines Mesasurements Health Checker');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $output->writeln('OK');

        return Command::SUCCESS;
    }
}
