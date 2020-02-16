<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DoctrineCommand extends Command
{
    protected function configure()
    {
        $this->setName('doctrine')
            ->setDescription('Doctrine')
            ->addArgument('arguments', InputArgument::IS_ARRAY);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $arguments = implode(' ', $input->getArgument('arguments'));
        $command = sprintf('./vendor/bin/doctrine %s', $arguments);
        $command = trim($command);

        system($command);

        return 0;
    }
}
