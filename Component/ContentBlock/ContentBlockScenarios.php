<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Common\Component\ContentBlock;

use Drupal\Core\Render\Markup;
use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\IdsTools\Scenario\Scenario;

class ContentBlockScenarios {

  #[Scenario(viewPortWidth: 1000, viewPortHeight: 300)]
  final public static function contentBlock(): ContentBlock {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('https://example.com/');

    $instance = ContentBlock::create(
      title: 'Content block title!',
      link: Atom\Link\Link::create('Link to more content!', $url),
      linkList: CommonComponents\LinkList\LinkList::create([
        Atom\Link\Link::create(title: 'Link 1!', url: $url),
        Atom\Link\Link::create(title: 'Link 2!', url: $url),
      ]),
    );
    $instance[] = Atom\Html\Html::create(Markup::create(<<<MARKUP
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
      MARKUP));
    return $instance;
  }

  #[Scenario(viewPortWidth: 1000, viewPortHeight: 300)]
  final public static function commonContentBlockWithImage(): ContentBlock {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('https://example.com/');

    $instance = ContentBlock::create(
      title: 'Content block title!',
      image: CommonComponents\Media\Image\Image::createSample(800, 600),
      link: Atom\Link\Link::create('Link to more content!', $url),
      linkList: CommonComponents\LinkList\LinkList::create([
        Atom\Link\Link::create(title: 'Link 1!', url: $url),
        Atom\Link\Link::create(title: 'Link 2!', url: $url),
        Atom\Link\Link::create(title: 'Link 3!', url: $url),
        Atom\Link\Link::create(title: 'Link 4!', url: $url),
        Atom\Link\Link::create(title: 'Link 5!', url: $url),
      ]),
    );
    $instance[] = Atom\Html\Html::create(Markup::create(<<<MARKUP
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
      MARKUP));
    return $instance;
  }

  #[Scenario(viewPortWidth: 1000, viewPortHeight: 300)]
  final public static function commonContentBlockWithIcon(): ContentBlock {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('https://example.com/');

    $instance = ContentBlock::create(
      title: 'Content block title!',
      icon: CommonAtoms\Icon\Icon::create(icon: 'favorite'),
      link: Atom\Link\Link::create('Link to more content!', $url),
      linkList: CommonComponents\LinkList\LinkList::create([
        Atom\Link\Link::create(title: 'Link 1!', url: $url),
        Atom\Link\Link::create(title: 'Link 2!', url: $url),
        Atom\Link\Link::create(title: 'Link 3!', url: $url),
        Atom\Link\Link::create(title: 'Link 4!', url: $url),
        Atom\Link\Link::create(title: 'Link 5!', url: $url),
      ]),
    );
    $instance[] = Atom\Html\Html::create(Markup::create(<<<MARKUP
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
      MARKUP));
    return $instance;
  }

}
