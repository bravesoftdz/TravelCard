<?php

namespace Dykyi\Response;

use Dykyi\CommandBus\Formatter\HtmlFormatter;
use Dykyi\Helpers\TextBuilder;
use Dykyi\Agreggates\Card;
use Dykyi\Services\CardService\CardStorage;
use Dykyi\Transformer\Transformer;
use Dykyi\Transformer\TransformerInterface;

/**
 * Class HTMLResponse
 * @package Dykyi\Response
 */
class WebResponse implements ResponseInterface
{
    /**
     * @param CardStorage $storage
     * @param TransformerInterface $transformer
     * @return string
     */
    public function response(CardStorage $storage, TransformerInterface $transformer): string
    {
        $text = TextBuilder::create();
        /** @var Card $card */
        foreach ($storage as $card) {
            $text->add($card->toString($transformer));
        }
        $text->add(Transformer::FINISH_LINE);

        return Htmlformatter::create()->format($text);
    }
}