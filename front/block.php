<?php
// block.php

function hello_world_render_block($attributes) {
    return 'Hello World!';
}

register_block_type('gutenberg-boilerplate/hello-world', array(
    'render_callback' => 'hello_world_render_block',
));
