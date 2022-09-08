<?php

namespace App\Entity;

use App\Repository\UsersSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersSettingsRepository::class)]
class UsersSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_filter_from;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_filter_to;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $company;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $filter_sort_by;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $filter_sort_order_asc;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $number_of_entries_per_page;

    #[ORM\OneToOne(inversedBy: 'users_settings', targetEntity: User::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFilterFrom(): ?\DateTimeInterface
    {
        return $this->date_filter_from;
    }

    public function setDateFilterFrom(?\DateTimeInterface $date_filter_from): self
    {
        $this->date_filter_from = $date_filter_from;

        return $this;
    }

    public function getDateFilterTo(): ?\DateTimeInterface
    {
        return $this->date_filter_to;
    }

    public function setDateFilterTo(?\DateTimeInterface $date_filter_to): self
    {
        $this->date_filter_to = $date_filter_to;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getFilterSortBy(): ?string
    {
        return $this->filter_sort_by;
    }

    public function setFilterSortBy(?string $filter_sort_by): self
    {
        $this->filter_sort_by = $filter_sort_by;

        return $this;
    }

    public function getFilterSortOrderAsc(): ?bool
    {
        return $this->filter_sort_order_asc;
    }

    public function setFilterSortOrderAsc(?bool $filter_sort_order_asc): self
    {
        $this->filter_sort_order_asc = $filter_sort_order_asc;

        return $this;
    }

    public function getNumberOfEntriesPerPage(): ?int
    {
        return $this->number_of_entries_per_page;
    }

    public function setNumberOfEntriesPerPage(?int $number_of_entries_per_page): self
    {
        $this->number_of_entries_per_page = $number_of_entries_per_page;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
