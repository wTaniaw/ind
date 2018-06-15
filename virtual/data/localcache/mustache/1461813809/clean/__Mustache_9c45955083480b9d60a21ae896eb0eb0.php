<?php

class __Mustache_9c45955083480b9d60a21ae896eb0eb0 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<div class="alert alert-block alert-info">';
        $value = $this->resolveValue($context->find('message'), $context, $indent);
        $buffer .= $value;
        $buffer .= '</div>
';

        return $buffer;
    }
}
