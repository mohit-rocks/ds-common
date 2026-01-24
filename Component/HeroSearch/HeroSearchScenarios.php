<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Common\Component\HeroSearch;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Component as CommonComponents;

final class HeroSearchScenarios {

  final public static function heroSearchForm(): HeroSearch {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    return HeroSearch::create(
      title: 'Hero Link List Title!',
      subtitle: 'Hero Link List Subtitle!',
      search: CommonComponents\SearchForm\SearchForm::create(actionUrl: 'https://example.com/search'),
    );
  }

  final public static function heroSearchLinkList(): HeroSearch {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    return HeroSearch::create(
      title: 'Hero Link List Title!',
      subtitle: 'Hero Link List Subtitle!',
      links: CommonComponents\LinkList\LinkList::create([
        Atom\Link\Link::create(title: 'A link', url: $url),
        Atom\Link\Link::create('Front page!', $url),
        Atom\Link\Link::create('Hero Link List item 2!', $url),
      ]),
    );
  }

  final public static function heroSearchFormAndImage(): HeroSearch {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    return HeroSearch::create(
      title: 'Title!',
      subtitle: 'Subtitle!',
      image: CommonComponents\Media\Image\Image::createSample(600, 200),
      search: CommonComponents\SearchForm\SearchForm::create(actionUrl: 'https://example.com/search'),
    );
  }

  final public static function heroSearchFormAndLinks(): HeroSearch {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    return HeroSearch::create(
      title: 'Hero Link List Title!',
      subtitle: 'Hero Link List Subtitle!',
      links: CommonComponents\LinkList\LinkList::create([
        Atom\Link\Link::create(title: 'A link', url: $url),
        Atom\Link\Link::create('Front page!', $url),
        Atom\Link\Link::create('Hero Link List item 2!', $url),
      ]),
      search: CommonComponents\SearchForm\SearchForm::create(actionUrl: 'https://example.com/search'),
    );
  }

}
