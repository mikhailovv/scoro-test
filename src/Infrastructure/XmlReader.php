<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

class XmlReader implements Reader
{
    private \XMLReader $xml;
    public function __construct(string $filename)
    {
        $this->xml = new \XMLReader();
        $this->xml->open(sprintf('file://%s', $filename));

    }

    public function getRow(): string
    {
        $data = '';
        while ($this->xml->read()){
            if ($this->xml->nodeType === \XMLReader::ELEMENT){
                $elementName = (string)$this->xml->name;
                if ($elementName === 'contact'){
                    $data = $this->xml->readOuterXml();
                    break;
                }
            }
        }

        return $data;
    }

    public function __destruct()
    {
        $this->xml->close();
    }
}
