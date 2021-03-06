<?php
/**
 * Created by PhpStorm.
 * User: christof
 * Date: 11.11.15
 * Time: 14:23
 */

namespace MandarinMedien\MMMediaBundle\Model;


interface MediaTypeInterface
{
    /**
     * checks the given data for best matching mediatype
     * @param $data
     * @return mixed
     */
    static function check($data);


    /**
     * return the name of the media type
     *
     * @return string
     */
    public function getName();


    /**
     * returns the mediytpe specific metadata
     *
     * @return array
     */
    public function getMetaData();


    /**
     * get the media type reference
     *
     * @return string
     */
    public function getReference();

    /**
     * get the media name
     *
     * @return string
     */
    public function getMediaName();

    /**
     * get the media description
     *
     * @return string
     */
    public function getMediaDescription();



    /**
     * return the Media Entity
     *
     * @return MediaInterface
     */
    public function getEntity();


    /**
     * return the unique name of mediatype
     *
     * @return string
     */
    public function __toString();

    /**
     * @param MediaInterface $media
     * @param array|null $options
     * @return mixed
     */
    public function getPreview(MediaInterface $media, array $options = null);
}