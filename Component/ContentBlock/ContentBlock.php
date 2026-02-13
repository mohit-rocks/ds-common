<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Common\Component\ContentBlock;

use Drupal\Component\Render\MarkupInterface;
use Drupal\Core\Template\Attribute;
use Pinto\Attribute\ObjectType;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Component;
use PreviousNext\Ds\Common\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;
use Ramsey\Collection\AbstractCollection;

/**
 * @extends AbstractCollection<mixed>
 */
#[Scenarios([ContentBlockScenarios::class])]
#[ObjectType\Slots(slots: [
  'title',
  'content',
  'image',
  'icon',
  'link',
  'linkList',
  'containerAttributes',
])]
class ContentBlock extends AbstractCollection implements Utility\CommonObjectInterface {

  use Utility\ObjectTrait;

  final private function __construct(
    public Atom\Heading\Heading $title,
    public ?Component\Media\Image\Image $image,
    public Atom\Icon\Icon|MarkupInterface|string|null $icon,
    public Atom\Link\Link|null $link,
    public ?Component\LinkList\LinkList $linkList,
    public Attribute $containerAttributes,
  ) {
    parent::__construct();
  }

  public static function create(
    string $title,
    ?Component\Media\Image\Image $image = NULL,
    Atom\Icon\Icon|MarkupInterface|string|null $icon = NULL,
    Atom\Button\Button|Atom\Link\Link|null $link = NULL,
    ?Component\LinkList\LinkList $linkList = NULL,
  ): static {
    if ($image !== NULL && $icon !== NULL) {
      throw new \LogicException(\sprintf('A `%s` object cannot have both $image and $icon populated.', static::class));
    }

    return static::factoryCreate(
      title: Atom\Heading\Heading::create($title, Atom\Heading\HeadingLevel::One),
      image: $image,
      icon: $icon,
      link: $link,
      linkList: $linkList,
      containerAttributes: new Attribute(),
    );
  }

  public function getType(): string {
    return 'mixed';
  }

}
