<?php

namespace XIVAPI\Api;

class SearchStringAlgorithms
{
    const CUSTOM               = 'custom';
    const WILDCARD             = 'wildcard';
    const WILDCARD_PLUS        = 'wildcard_plus';
    const FUZZY                = 'fuzzy';
    const TERM                 = 'term';
    const PREFIX               = 'prefix';
    const MATCH                = 'match';
    const MATCH_PHRASE         = 'match_phrase';
    const MATCH_PHRASE_PREFIX  = 'match_phrase_prefix';
    const MULTI_MATCH          = 'multi_match';
    const QUERY_STRING         = 'query_string';
    const SIMILAR              = 'similar';
}
