<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use App\Repositories\ArticlesRepositoryInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ArticlesCommand extends Command
{
    private ArticlesRepositoryInterface $articlesRepository;

    public function __construct(ArticlesRepositoryInterface $articlesRepository, string $name = null)
    {
        parent::__construct($name);

        $this->articlesRepository = $articlesRepository;
    }

    protected function configure()
    {
        $this->setName('articles')
            ->setDescription('Show all articles');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $articles = $this->articlesRepository->getAllArticles();

        foreach ($articles as $article) {
            $output->writeln(sprintf(
                'Article #%d: <info>%s</info>',
                $article->getId(),
                $article->getTitle()
            ));
        }

        return 0;
    }
}
