<?php

namespace AppBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="automailer")
 * @ORM\Entity()
 */
class Automailer extends \TSS\AutomailerBundle\Model\Automailer implements ResourceInterface
{
}
