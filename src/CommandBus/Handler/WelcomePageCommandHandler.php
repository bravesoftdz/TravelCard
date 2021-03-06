<?php

namespace Dykyi\CommandBus\Handler;

use Dykyi\CommandBus\Formatter\ConsoleFormatter;
use Dykyi\Helpers\TextBuilder;
use Symfony\Component\HttpFoundation\Response;
use SimpleBus\Command\Command;
use SimpleBus\Command\Handler\CommandHandler;

/**
 * Class WelcomePageCommandHandler
 * @package Dykyi\Command\Handler
 */
class WelcomePageCommandHandler implements CommandHandler
{
    public function handle(Command $command)
    {
        $content = TextBuilder::create()->add('')
            ->add("**************************************************")
            ->add("************ Welcome to Application **************")
            ->add("**************************************************")
            ->add('')
            ->add('Usage:')->add("command [options]", 2)
            ->add('')
            ->add('Available commands:')
            ->add("Version    - Application version", 2)
            ->add("BuildRoute - Build Route", 2)
            ->add('')
            ->add("**************************************************");

        (new Response(ConsoleFormatter::create()->format($content)))->send();
    }
}