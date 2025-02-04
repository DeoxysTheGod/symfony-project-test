<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $content = null;

  #[ORM\Column(length: 2)]
  private ?string $type = null;

  /**
   * @var Collection<int, Choice>
   */
  #[ORM\OneToMany(targetEntity: Choice::class, mappedBy: 'question', cascade: ['persist', 'remove'], orphanRemoval: false)]
  private Collection $choices;

  /**
   * @var Collection<int, QCM>
   */
  #[ORM\ManyToMany(targetEntity: QCM::class, mappedBy: 'question')]
  private Collection $qCMs;

  public function __construct()
  {
    $this->choices = new ArrayCollection();
    $this->qCMs = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent(string $content): static
  {
    $this->content = $content;

    return $this;
  }

  public function getType(): ?string
  {
    return $this->type;
  }

  public function setType(string $type): static
  {
    $this->type = $type;

    return $this;
  }

  /**
   * @return Collection<int, Choice>
   */
  public function getChoices(): Collection
  {
    return $this->choices;
  }

  public function addChoice(Choice $choice): static
  {
    if (!$this->choices->contains($choice)) {
      $this->choices->add($choice);
      $choice->setQuestion($this);
    }

    return $this;
  }

  public function removeChoice(Choice $choice): static
  {
    if ($this->choices->removeElement($choice)) {
      // set the owning side to null (unless already changed)
      if ($choice->getQuestion() === $this) {
        $choice->setQuestion(null);
      }
    }

    return $this;
  }

  /**
   * @return Collection<int, QCM>
   */
  public function getQCMs(): Collection
  {
    return $this->qCMs;
  }

  public function addQCM(QCM $qCM): static
  {
    if (!$this->qCMs->contains($qCM)) {
      $this->qCMs->add($qCM);
      $qCM->addQuestion($this);
    }

    return $this;
  }

  public function removeQCM(QCM $qCM): static
  {
    if ($this->qCMs->removeElement($qCM)) {
      $qCM->removeQuestion($this);
    }

    return $this;
  }
}
