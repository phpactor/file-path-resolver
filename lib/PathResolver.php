<?php

namespace Phpactor\BasePathResolver;

use Webmozart\PathUtil\Path;

class PathResolver
{
    /**
     * @var Filter[]
     */
    private $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function resolve(string $path): string
    {
        foreach ($this->filters as $filter) {
            $path = $filter->apply($path);
        }

        return $path;
    }
}
