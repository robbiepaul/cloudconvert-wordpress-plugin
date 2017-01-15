<?php

namespace WPCloudConvert\Twig;

class PluginExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('toArray', [$this, 'toArrayFilter']),
        ];
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('in_array', [$this, 'inArray']),
        ];
    }

    public function inArray($needle, $haystack)
    {
        return in_array($needle, $haystack, false);
    }

    public function toArrayFilter($obj)
    {
        return (array) $obj;
    }

    public function getName()
    {
        return 'plugin_extension';
    }
}
