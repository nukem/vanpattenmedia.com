---
title: Beef up TinyMCE in WordPress with the style selector
author: Chris Van Patten
layout: post
permalink: /2012/tinymce-wordpress-style-selector/
dsq_thread_id:
  - 885465250
---
# 

![][1]Simplifying your client’s experience with WordPress is a great way to help keep websites up-to-date in the way you as a designer intended. One way that can be accomplished is by streamlining WordPress’ built-in implementation of TinyMCE, a “what-you-see-is-what-you-get” editor that makes the Visual Editor possible.

 [1]: http://static.vanpattenmedia.com/content/uploads/2012/10/Screen-Shot-2012-10-14-at-22.39.04.png "Screen Shot 2012-10-14 at 22.39.04"

Out of the box, WordPress’ TinyMCE comes with a number of features that help you and your clients create content more quickly and easily. But suppose you need to style text in a certain way frequently? Perhaps it’s a style for pull quotes, or a frequently used call to action style. Asking clients to learn HTML and CSS snippets is a recipe for frustration. **Enter the TinyMCE style selector.**



### What is the style selector?

The style selector is a handy way to allow your clients to apply certain styles to text. Styles can be anything from a simple HTML element with a specific assigned class to a full-blown HTML element with a number of inline CSS style properties attached.

**The style selector is distinct from the “block formats” selector.** You’re already familiar with that dropdown; it’s enabled in WordPress by default, and lets you apply headers, paragraph tags, code tags, etc. **You can’t apply styles or classes with the block formats dropdown.**

To enable the style selector, you’ll need some custom code. Let’s have an example. Suppose we want the ability to set certain text as an inline pull-quote. Here’s how you’d do that.

### The code

First you’ll need to create a new plugin or find space in your `functions.php` file. You may want to place it in a plugin if you need it available no matter what theme is installed, and in the `functions.php` file if it’s specific to the theme you’re developing.

This PHP code will get you started:

    function custom_tinymce( $settings ) {
    
        $style_formats = array(
            array(
                // Your first style format here
            ),
        );
    
        $settings['style_formats'] = json_encode( $style_formats );
    
        return $settings;
    
    }
    
    add_filter( 'tiny_mce_before_init', 'custom_tinymce' );

This code sets up the style selector, but passing `$settings['style_formats']` a JSON-encoded array of your styles. TinyMCE will then process this array and make your styles available in the new dropdown.

Let’s isolate the `$style_formats` array and drop in an example style.

    $style_formats = array(
        array(
            'title'   => 'Pull Quote',
            'block'   => 'aside',
            'classes' => 'pull-quote',
            'wrapper' => true,
            'styles'  => array(
                'float'      => 'right',
                'width'      => '40%',
                'borderLeft' => '4px solid black',
                'margin'     => '0 0 0 20px',
                'padding'    => '0 0 0 15px',
                'fontStyle'  => 'italic'
            ),
        ),
    );

You can pretty quickly see what’s happening here. `title` sets up the title used in the dropdown menu and `'block' => 'aside'` tells TinyMCE to create a new block-level `` tag for this style with the classes defined in `classes` (you can also use `inline` in place of `block` for an inline-level tag).

`'wrapper' => true` means that this particular style can wrap around other block-level items (in this case, it’s necessary because the `` tag will wrap around a `` tag that TinyMCE will auto-insert) and then `styles` is a subarray of the styles I want applied inline directly to the element.

In this case, I chose to apply these attributes inline because it will mean the pull quote still displays reasonably well for email and RSS subcribers. The additional class is useful for adding styles that you may not want those subscribers to get, such as site-specific colors and fonts.

### Adding another

Suppose you wanted to add another style. Maybe you want to apply a class to a paragraph. Simply add another array, like so:

    $style_formats = array(
        array(
            'title'   => 'Pull Quote',
            'block'   => 'aside',
            'classes' => 'pull-quote',
            'wrapper' => true,
            'styles'  => array(
                'float'      => 'right',
                'width'      => '40%',
                'borderLeft' => '4px solid black',
                'margin'     => '0 0 0 20px',
                'padding'    => '0 0 0 15px',
                'fontStyle'  => 'italic'
            ),
        ),
        array(
            'title'    => 'No Indent paragraph',
            'selector' => 'p',
            'classes'  => 'no-indent',
            'wrapper'  => true,
        ),
    );

In this case, I used `'selector' => 'p'` instead of `'block' => 'p'`. That’s because the `` tags are already in place in TinyMCE. Using `selector` tells TinyMCE to apply your styles (in this case a “no-indent” class) to an existing selector.

### Summing up

Phew! That’s quite a lot. Fortunately it’s very easy to understand, and it’ s all [well-documented on the TinyMCE website][2] (the format of the code is different, but the meaning of the various pieces and parts is consistent).

 [2]: http://www.tinymce.com/wiki.php/Configuration:formats

The style selector is a very powerful way to simplify your clients’ workflow—and maybe your own workflow as well. It makes it painless to consistently apply complex styles to content, meaning happier clients and happier designers!