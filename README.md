#A Guestbook
This is Shannon's edition of a PHP guestbook. It's a very light fork of the [original php guestbook by baccyflap](http://baccyflap.com/res/gbdl/). 

Here is the [demo guestbook](https://guestbook.pixels.pink).

## Requirements
php support on your web host

## Installation and Setup
- Download the files
- Make a `guestbook` directory(or subdomain) wherever you want your guestbook to be.
- Put `data.txt`, `style.css`, and `index.php` in your `guestbook` directory.
- Give the `data.txt` file read and write permissions(CHMOD 666)
- It should work after that, and you can fill out the form to sign the guestbook.
- I've left my first post in the guestbook `data.txt` so that you can see how the guestbook entries will look and not start with an empty guestbook, but you can delete it from the text file if you want. 
- Optionally, you can edit `style.css` to style the page however you want. I used color variables, listed at the top of `style.css` to make it really simple to just change your color scheme if you like.
- You can edit `index.php` to change things like the `<title>` and the page header. 
- I've included some comments in the code to help you find the welcome message to more easily edit that if you want. 
- You'll find the footer down at the bottom, again with a comment to help you find where you might want to add a footer, like a link back to your website. 

From the original ReadMe, included in full below.
> Somewhere in the PHP code, you'll also find some commented out lines (lines preceded by //); if you uncomment those and input your email address, you'll receive an email for each new message.

## Shannon Edition
I've very lightly forked this from the [original php guestbook by baccyflap](http://baccyflap.com/res/gbdl/).

The original is a beautifully simple guestbook which uses only two files and works with very little setup.

The changes I made were mostly structure and style of the index page html, making it more mobile friendly, and making the stylesheet external for easier style changes. Now it's three files instead of two, but I think it's easier to style with the external stylesheet. I even put in color variables to make it extra simple to pick your own color scheme. 

I also added some comments on the index page to help people find where to edit some text on the page they might want to edit.

2025-02-23
Shannon Kay
https://web.pixelshannon.com/aguestbook/

***
## Original Readme
I wrote this guestbook in PHP, as simple as I could make it. It's almost ready to use straight out of the box; all you need to do to get it working is to place all files in the same directory and ensure that data.txt has the appropriate permissions: CHMOD 666.

The guestbook data is written directly to a textfile, data.txt, from which it also reads data to reproduce on the same page. There's a cheeky little PHP redirect involved that makes it so that refreshing the page doesn't repost the message. There's also an even cheekier little field in the form that appears 1000 pixels left of your viewport. You don't see it, but bots do, and if they put a value in that field, nothing is posted - it's primitive spam control.

Somewhere in the PHP code, you'll also find some commented out lines (lines preceded by //); if you uncomment those and input your email address, you'll receive an email for each new message. Neat stuff.

Thanks to Gus for catching bugs and instructing me on how to clean up and improve some of the code.

I hereby publish this guestbook into the public domain. If you want to use and adapt it, go forth and be merry, no credits required - although a link is always appreciated.

2024-05-16
rmf
baccyflap.com
