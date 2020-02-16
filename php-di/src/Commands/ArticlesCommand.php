<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use App\Repositories\ArticlesRepositoryInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ArticlesCommand extends Command
{
    private $articlesRepository;

    public function __construct(ArticlesRepositoryInterface $articlesRepository, string $name = null)
    {
        parent::__construct($name);

        $this->articlesRepository = $articlesRepository;
    }

    protected function configure()
    {
        $this->setName('articles')
            ->addArgument('article-id')
            ->setDescription('Show all articles or a single article');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getArgument('article-id')) {
            $this->showSingleArticle($input, $output);
        } else {
            $this->showAllArticles($input, $output);
        }

        return 0;
    }

    private function showAllArticles(InputInterface $input, OutputInterface $output)
    {
        $articles = $this->articlesRepository->getAllArticles();

        foreach ($articles as $article) {
            $output->writeln(sprintf(
                'Article #%d: <info>%s</info>',
                $article->getId(),
                $article->getTitle()
            ));
        }
    }

    private function showSingleArticle(InputInterface $input, OutputInterface $output)
    {
        $article = $this->articlesRepository->getArticleById($input->getArgument('article-id'));
        if (is_null($article)) {
            $output->writeln('No article found');
            return;
        }
        $output->writeln(sprintf(
            'Article #%d: <info>%s</info>',
            $article->getId(),
            $article->getTitle()
        ));
    }
}
