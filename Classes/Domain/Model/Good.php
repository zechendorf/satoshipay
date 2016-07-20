<?php
namespace ZECHENDORF\Satoshipay\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Christopher Zechendorf <christopher@zechendorf.com>, ZECHENDORF
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Good
 */
class Good extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * secret
     *
     * @var string
     */
    protected $secret = '';
    
    /**
     * price
     *
     * @var int
     */
    protected $price = 0;
    
    /**
     * goodId
     *
     * @var string
     */
    protected $goodId = '';
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the secret
     *
     * @return string $secret
     */
    public function getSecret()
    {
        return $this->secret;
    }
    
    /**
     * Sets the secret
     *
     * @param string $secret
     * @return void
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }
    
    /**
     * Returns the price
     *
     * @return int $price
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Sets the price
     *
     * @param int $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    /**
     * Returns the goodId
     *
     * @return string $goodId
     */
    public function getGoodId()
    {
        return $this->goodId;
    }
    
    /**
     * Sets the goodId
     *
     * @param string $goodId
     * @return void
     */
    public function setGoodId($goodId)
    {
        $this->goodId = $goodId;
    }

    /**
     * content
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Satoshipay\Domain\Model\Content>
     * @lazy
     */
    protected $content = '';
    
     /**
     * Initializes all ObjectStorage properties
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->content = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Adds a Content
     *
     * @param \ZECHENDORF\Satoshipay\Domain\Model\Content $content
     * @return void
     */
    public function addContent(\ZECHENDORF\Satoshipay\Domain\Model\Content $content)
    {
        $this->content->attach($content);
    }
    
    /**
     * Removes a Content
     *
     * @param \ZECHENDORF\Satoshipay\Domain\Model\Content $contentToRemove The LocationContent to be removed
     * @return void
     */
    public function removeContent(\ZECHENDORF\Satoshipay\Domain\Model\Content $contentToRemove)
    {
        $this->content->detach($contentToRemove);
    }

    /**
     * Returns the content
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Satoshipay\Domain\Model\Content> $content
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Sets the content
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Satoshipay\Domain\Model\Content> $content
     * @return void
     */
    public function setContent(\ZECHENDORF\Satoshipay\Domain\Model\Content $content)
    {
        $this->content = $content;
    }
    
}
