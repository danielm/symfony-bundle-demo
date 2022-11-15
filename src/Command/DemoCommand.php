<?php

namespace Danielm\DemoBundle\Command;

use Danielm\DemoBundle\Configuration;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'demo:command',
    description: 'Just a simple command from our DemoBundle',
)]
class DemoCommand extends Command
{
    public function __construct(
        protected Configuration $configuration
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::OPTIONAL, 'Argument description', 'Joe');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');

        $io->success(sprintf('Hello %s!', $name));

        return Command::SUCCESS;
    }
}
