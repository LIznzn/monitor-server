<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NodeAlert
 *
 * @ORM\Table(name="node_alert")
 * @ORM\Entity
 */
class NodeAlert
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="level", type="boolean", nullable=true)
     */
    private $level;

    /**
     * @var string|null
     *
     * @ORM\Column(name="info", type="string", length=512, nullable=true)
     */
    private $info;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Node", inversedBy="alerts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $node;

    public function getNode(): ?Node
    {
        return $this->node;
    }

    public function setNode(?Node $node): self
    {
        $this->node = $node;

        return $this;
    }


}
