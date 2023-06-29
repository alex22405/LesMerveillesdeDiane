<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $product_name = null;

    #[ORM\Column(length: 255)]
    private ?string $product_image = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $product_created_at = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $category_id = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Admin $admin_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): static
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getProductImage(): ?string
    {
        return $this->product_image;
    }

    public function setProductImage(string $product_image): static
    {
        $this->product_image = $product_image;

        return $this;
    }

    public function getProductCreatedAt(): ?\DateTimeImmutable
    {
        return $this->product_created_at;
    }

    public function setProductCreatedAt(\DateTimeImmutable $product_created_at): static
    {
        $this->product_created_at = $product_created_at;

        return $this;
    }

    public function getCategoryId(): ?Categories
    {
        return $this->category_id;
    }

    public function setCategoryId(?Categories $category_id): static
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getAdminId(): ?Admin
    {
        return $this->admin_id;
    }

    public function setAdminId(?Admin $admin_id): static
    {
        $this->admin_id = $admin_id;

        return $this;
    }

}
