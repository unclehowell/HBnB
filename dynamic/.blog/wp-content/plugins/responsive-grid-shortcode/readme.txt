=== Responsive Grid Shortcode ===
Contributors: justingreerbbi
Donate link: http://jsutin-greer.com/
Tags: responsive grid, responsive shortcode
Requires at least: 4.3
Tested up to: 4.6
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Crazy simple and light weight plugin for using shortcode to create a responsive grid.

== Description ==

The plugin utilizes the 12 column responsive grid CSS from http://www.responsivegridsystem.com/ with the default 1.6% margin and 480PX media query.

Major features in Responsive Grid Shortcode include:

* Responsive grids up to 12 columns
* Add classes to each column or section for precise control over styles.
* Simple to use shortcode. All you have to know is how to count to 12!

The shortcode are extremely simply to follow as they follow as you can see below.

`
[grid_section]

[grid_col size=4]
	First Col Content
[/grid_col]

[grid_col size=4]
	Second Col Content
[/grid_col]

[grid_col size=4]
	Third Col Content
[/grid_col]

[/grid_section]
`

NOTE: The one thing to keep in mind is that all the column sizes inside a section *MUST* equal 12.

Some things that you should note. Responsive Grid Shortcode default to size 6 if no size attribute is provided.
An example of this is below:

`
[grid_section]

[grid_col]
	Left Side
[/grid_col]

[grid_col]
	Right Side
[/grid_col]

[/grid_section]
`

FYI: The column size can be any number. The each size value represents `{size} of 12`.

**OPTIONS**

We kept the options extremely simple to make sure the system is light weight.

*[grid_section class=custom-class]*

 * class - You can provide a custom class to the section if you choose. 

*[grid_col size=4 class=custom-class]*
 
 * class (optional) - You can provide a custom class to the column if you choose. 
 * size (optional) - number out of 12. (2 = 2 out 12 | 3 = 3 out of 12)

== Installation ==

1. Upload `responsive-grid-shortcode` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress and you are ready to rock!

== Frequently Asked Questions ==

= Where can I go if I have trouble? =

You are more than welcome to post here on the WordPress forums under the plugin's support sub-forum. 

== Screenshots ==

1. Easy and simple responsive 3 column layout

== Changelog ==

= 1.1 =
* Fixed shortcode rendering inside grid.

= 1.0 =
* Initial Release

== Example ==
`
[grid_section class=my-grid]

	[grid_col size=8]The size of this colum is 8[/grid_col]
	[grid_col size=4]The size of this column is 4.[/grid_col]

[/grid_section]
`

Notice that the column sizes when added up equal 12.