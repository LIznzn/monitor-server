<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NodeLog
 *
 * @ORM\Table(name="node_log")})
 * @ORM\Entity
 */
class NodeLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var int|null
     *
     * @ORM\Column(name="load_sys", type="integer", nullable=true)
     */
    private $loadSys;

    /**
     * @var int|null
     *
     * @ORM\Column(name="load_cpu", type="integer", nullable=true)
     */
    private $loadCpu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="load_io", type="integer", nullable=true)
     */
    private $loadIo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ram_usage", type="bigint", nullable=true)
     */
    private $ramUsage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="swap_usage", type="integer", nullable=true)
     */
    private $swapUsage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="disk_usage", type="bigint", nullable=true)
     */
    private $diskUsage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tx_gap", type="integer", nullable=true)
     */
    private $txGap;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rx_gap", type="integer", nullable=true)
     */
    private $rxGap;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Node")
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
