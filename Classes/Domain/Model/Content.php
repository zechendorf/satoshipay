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
 * Content
 */
class Content extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

   /**
    * uid
    *
    * @var string
    */
   protected $uid = '';

   /**
    * pid
    *
    * @var string
    */
   protected $pid = '';

   /**
    * header
    *
    * @var string
    */
   protected $header = '';

   /**
    * sorting
    *
    * @var string
    */
   protected $sorting = '';

   /**
    * contentType
    *
    * @var string
    */
   protected $contentType = '';

   /**
    * Gets the uid
    *
    * @return string $uid
    */
   public function getUid() {
      return $this->uid;
   }
   /**
    * Gets the pid
    *
    * @return string $pid
    */
   public function getPid() {
      return $this->pid;
   }

   /**
    * Returns the header
    *
    * @return string $header
    */
   public function getHeader() {
      return $this->header;
   }

   /**
    * Sets the header
    *
    * @param string $header
    * @return void
    */
   public function setHeader($header) {
      $this->header = $header;
   }

   /**
    * Returns the sorting
    *
    * @return string $sorting
    */
   public function getSorting() {
      return $this->sorting;
   }

   /**
    * Sets the sorting
    *
    * @param string $sorting
    * @return void
    */
   public function setSorting($sorting) {
      $this->sorting = $sorting;
   }

   /**
    * Returns the contentType
    *
    * @return string $contentType
    */
   public function getContentType() {
      return $this->contentType;
   }

   /**
    * Sets the contentType
    *
    * @param string $contentType
    * @return void
    */
   public function setContentType($contentType) {
      $this->contentType = $contentType;
   }

}
