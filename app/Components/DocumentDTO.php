<?php

namespace App\Components;

class DocumentDTO{
    /** @var string */
    protected $name = '';
    /** @var string */
    protected $type = '';
    /** @var string */
    protected $url = '';
    /** @var string */
    protected $modified = null;

    /**
     * @return string
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param timestamp $modified
     */
    public function setModified($modified)
    {
        $this->modified = date('m/d/Y', $modified);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}
