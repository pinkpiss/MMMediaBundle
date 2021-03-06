<?php

namespace MandarinMedien\MMMediaBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use MandarinMedien\MMMediaBundle\MediaType\MediaTypeManager;

class MediaTypeType extends StringType
{

    const NAME = 'mmmediabundle_mediatype'; // modify to match your type name

    private $mediaTypeManager;

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        /** @var $mtm MediaTypeManager */
        $mtm = $this->getMediaTypeManager();

        $mt = $mtm->getInstanceByName($value);

        return $mt ? $mt : null;
    }


    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {

        if ((new \ReflectionClass($value))->implementsInterface('\MandarinMedien\MMMediaBundle\Model\MediaTypeInterface')) {
            return $value->getName();
        }

        return '';
    }

    public function getName()
    {
        return self::NAME; // modify to match your constant name
    }

    /**
     * @return mixed
     */
    public function getMediaTypeManager()
    {
        return $this->mediaTypeManager;
    }

    /**
     * @param mixed $mediaTypeManager
     * @return MediaTypeType
     */
    public function setMediaTypeManager($mediaTypeManager)
    {
        $this->mediaTypeManager = $mediaTypeManager;
        return $this;
    }


}

