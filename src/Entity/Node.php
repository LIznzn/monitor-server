<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Node
 *
 * @ORM\Entity
 * @UniqueEntity(fields={"UUID"}, message="There is already a node with this UUID")
 */
class Node
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=true)
     */
    private $createTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="update_time", type="datetime", nullable=true)
     */
    private $updateTime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=true)
     */
    private $version;

    /**
     * @var int|null
     *
     * @ORM\Column(name="uptime", type="integer", nullable=true)
     */
    private $uptime;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sessions", type="integer", nullable=true)
     */
    private $sessions;

    /**
     * @var int|null
     *
     * @ORM\Column(name="processes", type="integer", nullable=true)
     */
    private $processes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="file_handles", type="bigint", nullable=true)
     */
    private $fileHandles;

    /**
     * @var int|null
     *
     * @ORM\Column(name="file_handles_limit", type="bigint", nullable=true)
     */
    private $fileHandlesLimit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="host_name", type="string", length=255, nullable=true)
     */
    private $hostName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="os_kernel", type="string", length=255, nullable=true)
     */
    private $osKernel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="os_name", type="string", length=255, nullable=true)
     */
    private $osName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="os_arch", type="string", length=32, nullable=true)
     */
    private $osArch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cpu_name", type="string", length=255, nullable=true)
     */
    private $cpuName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cpu_cores", type="integer", nullable=true)
     */
    private $cpuCores;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cpu_freq", type="integer", nullable=true)
     */
    private $cpuFreq;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ram_total", type="integer", nullable=true)
     */
    private $ramTotal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ram_usage", type="integer", nullable=true)
     */
    private $ramUsage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="swap_total", type="integer", nullable=true)
     */
    private $swapTotal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="swap_usage", type="integer", nullable=true)
     */
    private $swapUsage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="disk_total", type="bigint", nullable=true)
     */
    private $diskTotal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="disk_usage", type="bigint", nullable=true)
     */
    private $diskUsage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="connections", type="integer", nullable=true)
     */
    private $connections;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nic", type="string", length=128, nullable=true)
     */
    private $nic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ipv4", type="string", length=255, nullable=true)
     */
    private $ipv4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ipv6", type="string", length=255, nullable=true)
     */
    private $ipv6;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rx", type="bigint", nullable=true)
     */
    private $rx;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tx", type="bigint", nullable=true)
     */
    private $tx;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rx_gap", type="integer", nullable=true)
     */
    private $rxGap;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tx_gap", type="integer", nullable=true)
     */
    private $txGap;

    /**
     * @var float|null
     *
     * @ORM\Column(name="load1", type="float", precision=10, scale=0, nullable=true)
     */
    private $load1;

    /**
     * @var float|null
     *
     * @ORM\Column(name="load5", type="float", precision=10, scale=0, nullable=true)
     */
    private $load5;

    /**
     * @var float|null
     *
     * @ORM\Column(name="load15", type="float", precision=10, scale=0, nullable=true)
     */
    private $load15;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="nodes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $processesList;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $diskList;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NodeAlert", mappedBy="node", orphanRemoval=true)
     */
    private $alerts;

    /**
     * @ORM\Column(type="uuid")
     */
    private $uuid;

    public function __construct()
    {
        $this->alerts = new ArrayCollection();
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreateTime(): ?\DateTimeInterface
    {
        return $this->createTime;
    }

    public function setCreateTime(?\DateTimeInterface $createTime): self
    {
        $this->createTime = $createTime;

        return $this;
    }

    public function getUpdateTime(): ?\DateTimeInterface
    {
        return $this->updateTime;
    }

    public function setUpdateTime(?\DateTimeInterface $updateTime): self
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getUptime(): ?int
    {
        return $this->uptime;
    }

    public function setUptime(?int $uptime): self
    {
        $this->uptime = $uptime;

        return $this;
    }

    public function getSessions(): ?int
    {
        return $this->sessions;
    }

    public function setSessions(?int $sessions): self
    {
        $this->sessions = $sessions;

        return $this;
    }

    public function getProcesses(): ?int
    {
        return $this->processes;
    }

    public function setProcesses(?int $processes): self
    {
        $this->processes = $processes;

        return $this;
    }

    public function getFileHandles(): ?string
    {
        return $this->fileHandles;
    }

    public function setFileHandles(?string $fileHandles): self
    {
        $this->fileHandles = $fileHandles;

        return $this;
    }

    public function getFileHandlesLimit(): ?string
    {
        return $this->fileHandlesLimit;
    }

    public function setFileHandlesLimit(?string $fileHandlesLimit): self
    {
        $this->fileHandlesLimit = $fileHandlesLimit;

        return $this;
    }

    public function getHostName(): ?string
    {
        return $this->hostName;
    }

    public function setHostName(?string $hostName): self
    {
        $this->hostName = $hostName;

        return $this;
    }

    public function getOsKernel(): ?string
    {
        return $this->osKernel;
    }

    public function setOsKernel(?string $osKernel): self
    {
        $this->osKernel = $osKernel;

        return $this;
    }

    public function getOsName(): ?string
    {
        return $this->osName;
    }

    public function setOsName(?string $osName): self
    {
        $this->osName = $osName;

        return $this;
    }

    public function getOsArch(): ?string
    {
        return $this->osArch;
    }

    public function setOsArch(?string $osArch): self
    {
        $this->osArch = $osArch;

        return $this;
    }

    public function getCpuName(): ?string
    {
        return $this->cpuName;
    }

    public function setCpuName(?string $cpuName): self
    {
        $this->cpuName = $cpuName;

        return $this;
    }

    public function getCpuCores(): ?int
    {
        return $this->cpuCores;
    }

    public function setCpuCores(?int $cpuCores): self
    {
        $this->cpuCores = $cpuCores;

        return $this;
    }

    public function getCpuFreq(): ?int
    {
        return $this->cpuFreq;
    }

    public function setCpuFreq(?int $cpuFreq): self
    {
        $this->cpuFreq = $cpuFreq;

        return $this;
    }

    public function getRamTotal(): ?int
    {
        return $this->ramTotal;
    }

    public function setRamTotal(?int $ramTotal): self
    {
        $this->ramTotal = $ramTotal;

        return $this;
    }

    public function getRamUsage(): ?int
    {
        return $this->ramUsage;
    }

    public function setRamUsage(?int $ramUsage): self
    {
        $this->ramUsage = $ramUsage;

        return $this;
    }

    public function getSwapTotal(): ?int
    {
        return $this->swapTotal;
    }

    public function setSwapTotal(?int $swapTotal): self
    {
        $this->swapTotal = $swapTotal;

        return $this;
    }

    public function getSwapUsage(): ?int
    {
        return $this->swapUsage;
    }

    public function setSwapUsage(?int $swapUsage): self
    {
        $this->swapUsage = $swapUsage;

        return $this;
    }

    public function getDiskTotal(): ?string
    {
        return $this->diskTotal;
    }

    public function setDiskTotal(?string $diskTotal): self
    {
        $this->diskTotal = $diskTotal;

        return $this;
    }

    public function getDiskUsage(): ?string
    {
        return $this->diskUsage;
    }

    public function setDiskUsage(?string $diskUsage): self
    {
        $this->diskUsage = $diskUsage;

        return $this;
    }

    public function getConnections(): ?int
    {
        return $this->connections;
    }

    public function setConnections(?int $connections): self
    {
        $this->connections = $connections;

        return $this;
    }

    public function getNic(): ?string
    {
        return $this->nic;
    }

    public function setNic(?string $nic): self
    {
        $this->nic = $nic;

        return $this;
    }

    public function getIpv4(): ?string
    {
        return $this->ipv4;
    }

    public function setIpv4(?string $ipv4): self
    {
        $this->ipv4 = $ipv4;

        return $this;
    }

    public function getIpv6(): ?string
    {
        return $this->ipv6;
    }

    public function setIpv6(?string $ipv6): self
    {
        $this->ipv6 = $ipv6;

        return $this;
    }

    public function getRx(): ?string
    {
        return $this->rx;
    }

    public function setRx(?string $rx): self
    {
        $this->rx = $rx;

        return $this;
    }

    public function getTx(): ?string
    {
        return $this->tx;
    }

    public function setTx(?string $tx): self
    {
        $this->tx = $tx;

        return $this;
    }

    public function getRxGap(): ?int
    {
        return $this->rxGap;
    }

    public function setRxGap(?int $rxGap): self
    {
        $this->rxGap = $rxGap;

        return $this;
    }

    public function getTxGap(): ?int
    {
        return $this->txGap;
    }

    public function setTxGap(?int $txGap): self
    {
        $this->txGap = $txGap;

        return $this;
    }

    public function getLoad1(): ?float
    {
        return $this->load1;
    }

    public function setLoad1(?float $load1): self
    {
        $this->load1 = $load1;

        return $this;
    }

    public function getLoad5(): ?float
    {
        return $this->load5;
    }

    public function setLoad5(?float $load5): self
    {
        $this->load5 = $load5;

        return $this;
    }

    public function getLoad15(): ?float
    {
        return $this->load15;
    }

    public function setLoad15(?float $load15): self
    {
        $this->load15 = $load15;

        return $this;
    }

    public function getLoadSys(): ?int
    {
        return $this->loadSys;
    }

    public function setLoadSys(?int $loadSys): self
    {
        $this->loadSys = $loadSys;

        return $this;
    }

    public function getLoadCpu(): ?int
    {
        return $this->loadCpu;
    }

    public function setLoadCpu(?int $loadCpu): self
    {
        $this->loadCpu = $loadCpu;

        return $this;
    }

    public function getLoadIo(): ?int
    {
        return $this->loadIo;
    }

    public function setLoadIo(?int $loadIo): self
    {
        $this->loadIo = $loadIo;

        return $this;
    }

    public function getProcessesList(): ?string
    {
        return $this->processesList;
    }

    public function setProcessesList(?string $processesList): self
    {
        $this->processesList = $processesList;

        return $this;
    }

    public function getDiskList(): ?string
    {
        return $this->diskList;
    }

    public function setDiskList(?string $diskList): self
    {
        $this->diskList = $diskList;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection|NodeAlert[]
     */
    public function getAlerts(): Collection
    {
        return $this->alerts;
    }

    public function addAlert(NodeAlert $alert): self
    {
        if (!$this->alerts->contains($alert)) {
            $this->alerts[] = $alert;
            $alert->setNode($this);
        }

        return $this;
    }

    public function removeAlert(NodeAlert $alert): self
    {
        if ($this->alerts->contains($alert)) {
            $this->alerts->removeElement($alert);
            // set the owning side to null (unless already changed)
            if ($alert->getNode() === $this) {
                $alert->setNode(null);
            }
        }

        return $this;
    }

}
