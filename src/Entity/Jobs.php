<?php

namespace App\Entity;

use App\Repository\JobsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobsRepository::class)]
class Jobs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'uuid',length: 36)]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $job;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $job_ref;

    #[ORM\Column(type: 'string', length: 2000)]
    private $link;

    #[ORM\Column(type: 'string', length: 32, nullable: true)]
    private $refkey;

    #[ORM\ManyToOne(targetEntity: Companies::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $company;

    #[ORM\ManyToOne(targetEntity: Professions::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $profession;

    #[ORM\ManyToOne(targetEntity: Divisions::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $division;

    #[ORM\ManyToOne(targetEntity: Roles::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $role;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_published;

    public function getId()
    {
        return $this->id;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getJobRef(): ?string
    {
        return $this->job_ref;
    }

    public function setJobRef(?string $job_ref): self
    {
        $this->job_ref = $job_ref;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getRefkey(): ?string
    {
        return $this->refkey;
    }

    public function setRefkey(?string $refkey): self
    {
        $this->refkey = $refkey;

        return $this;
    }

    public function getCompanyId(): ?Companies
    {
        return $this->company;
    }

    public function setCompanyId(?Companies $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getProfessionId(): ?Professions
    {
        return $this->profession;
    }

    public function setProfessionId(?Professions $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getDivisionId(): ?Divisions
    {
        return $this->division;
    }

    public function setDivisionId(?Divisions $division): self
    {
        $this->division = $division;

        return $this;
    }

    public function getRoleId(): ?Roles
    {
        return $this->role;
    }

    public function setRoleId(?Roles $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getDatePublished(): ?\DateTimeInterface
    {
        return $this->date_published;
    }

    public function setDatePublished(?\DateTimeInterface $date_published): self
    {
        $this->date_published = $date_published;

        return $this;
    }
}
