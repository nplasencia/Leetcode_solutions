<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\AddTwoNumbers;

class ListNode
{
    public int $val = 0;
    public ?ListNode $next = null;

    function __construct(int $val = 0, ListNode $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}
