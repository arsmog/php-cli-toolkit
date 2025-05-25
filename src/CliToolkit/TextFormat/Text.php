<?php

namespace CliToolkit\TextFormat;

class Text
{
    /**
     * Attribute pattern
     * @var string
     */
    private string $attributePattern = "\033[%dm";

    /**
     * Text to format
     * @var string
     */
    private string $text;

    /**
     * @param string Text to format
     */
    public function __construct(string $text = '')
    {
        $this->set($text);
    }

    /**
     * Returns the text attribute
     * @param int $code Attribute code
     * @return string
     */
    public function getAttribute(int $code): string
    {
        return sprintf($this->attributePattern, $code);
    }

    /**
     * Inserts text attributes
     * @param int $code Attribute code
     * @return \CliToolkit\View\Text
     */
    public function insertAttribute(int $code): Text
    {
        $this->text = sprintf(
            "%s%s",
            $this->getAttribute($code),
            $this->text)
        ;
        return $this;
    }

    /**
     * Sets the text to be formatted
     * @param string $text Text to format
     * @return \CliToolkit\View\Text
     */
    public function set(string $text): Text
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Returns formatted text
     * @param bool Add reset to the end of the text
     * @return string
     */
    public function get(bool $append_reset = true): string
    {
        return sprintf(
            "%s%s",
            $this->text,
            $append_reset ? $this->getAttribute(TextAttribute::RESET) : ''
        );
    }
}