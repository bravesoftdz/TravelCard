<?php

namespace Dykyi\Response;

use Dykyi\CommandBus\Formatter\ConsoleFormatter;
use Dykyi\Helpers\TextBuilder;
use Dykyi\Agreggates\Card;
use Dykyi\Transformer\Transformer;
use Dykyi\Transformer\TransformerInterface;

/**
 * Class CliResponse
 * @package Dykyi\Response
 */
class CliResponse implements ResponseInterface
{
    /**
     * @param array $data
     * @param TransformerInterface $transformer
     * @return string
     */
    public function response(array $data, TransformerInterface $transformer): string
    {
        $text = TextBuilder::create();
        /** @var Card $card */
        foreach ($data as $card) {
            $text->add($card->toString($transformer));
        }
        $text->add(Transformer::FINISH_LINE);

        return ConsoleFormatter::create()->format($text);
    }
}