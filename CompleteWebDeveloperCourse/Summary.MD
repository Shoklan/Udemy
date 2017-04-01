# Complete Web Developer Course
## Rob Percival

## Introduction
- Goals:
	1. Clone of BBC site.
	2. Browser Game.
	3. Code Player Website.
	4. Create a Blog/Website.
	5. Creating a Shop.
	6. Weather Search via PHP
	7. Secret Diary Site.
	8. Google Maps API
	9. Custom Twitter API.
	10. Drawing App.
- This is a redo so I don't have access to the "free stuff."
- To set up FTP:
	1. Download an FTP program.
	2. Setup config settigs.
	3. Connect.
- Cool site similar to codepen at [jsbin](http://www.jsbin.com).

## Hypertext Mark Up Language
- It's good convention to have a DOCTYPE to make it easier to parse for Web browsers.
- Anything in french braces is called a **tag**.
- Anything with `< >` is an opening tag
- Anything with `</ >` is a closing tag
- The first part of a webpage is the head.
- The head contains supporting information - such as source files.

- **Title** tag is what shows up for the browser window title.
- **Meta** tag is for describing the webpage itself.

- **Body** tag is where all the content is.
- **Div** stands for divisions of the page.
- **H#** is for headers of sections of a page.
- **P** is short for paragraph.
- **A** is an anchor to another page.

- Proper nomenclature means that there should only be one H1 tag.
- Html ignores line breaks and redundant spaces.
- You should use `<br />`; even if it's not enforced.
- Use `<hr />` for Horizontal Rules.
- Don't use `<strong>` for anything, ever. You'll want to use CSS for this.
- Don't use `<em>` for anything, ever.     You'll want to use CSS for this.
- Don't use `<u>` for anything, ever.      You'll want to use CSS for this.
- Don't use `<strike>` for anything, ever. You'll want to use CSS for this.

- Use `<ul>` for unordered lists.
- Use `<li>` for list items.
- Use `<ol>` for ordered lists.
- To insert imagees, use `<img src=[path_to_file] />`.
- To adjust the dimensions of an image, use the attributes `height=` and `weight=`.
- **Form** is used for creating interactable content.
- **Input** is for user input; self-closing.
	1. `type="text"` //
		i. `value="example"` // Use placeholder instead.
		ii. `placeholder="delete me"`.
	2. `type="email"`
	3. `type="radio"`
		i. To group them, use `name= "grouping"`.
	4. `type="checkbox"`
	5. `type="submit"`
		i. To set the button name, use `value="Click Me"`.
		ii. Use `name="submit"` to identify this item.
		iii. There is now a `<submit>` now in HTML5.

- **Textarea** is for a larger comment block; needs to be closed.
- **Placeholder** should work for textarea.
- **Select** for dropdown boxes.
- **Option** is nested in **select** for possible choices; needs to be closed.
- Items must have names to submit the values entered to the backend.

- To create a table, use `<table>`.
- All tables contain table rows defined as `<tr>`.
- Define headers in the table using `<th>`.
- Inside table rows are table data using `<td>`.

- HTML entities are characters that are used to mark up documents; therefore it requires meta characters to represent them.
- FRAMES ARE EVIL; ONLY USE AS A LAST RESORT.
- Create a frame using `<iframe src="source_file_or_page" ></iframe>

## Cascading Style Sheet
- There are three kinds of styles:
	1. External.
	2. Internal.
	3. Inline.

- This is used to control how elements appear in a document.
- You can add inline CSS using the attribute `style=""`.
- Internal CSS is included in the header with the format:

```html
<style type= "text/css">
	element_target{
		attribute: value;
	}
</style>
```

- A *Class* is a descriptor that can be applied to elements of an HTML document.
- This is identified in a CSS file using `.element_target`.
- You apply the class by adding `class= "class_name"`.
- **Id's** are similar to classes, but should be limited to a single element.
- You can apply a class and an id to an element.
- You can apply more than one class in the same attribute; e.g. `style= "large red"`.

- You can float elements using `float: {left|right}`.
- This causes the object to fill the area where you request it to fill.
- Use `clear: both;` to ensure that no objects exist on either side of the div.
- Declare an attribute `position: relative;` to allow one to move a div relative to it's normal position.
- You can change the depth of an object using the `z-index`.
- This does not have any impact unless you allow it to move via **position**; usually **relative**.
- An **Absolute** position is removed from the document flow, but remains relative to the position in the document.
- **Fixed** items are ignored by other elements by removing it from the docuemnt flow.
- **Fixed** also holds the element in place in relation with the browser.

- A **Margin** controls the space around an element.
- You can assign a value to each side in one declaration: `margin: top right bottom left;`.
- You can set only one side using `margin-{top|right|bottom|left}: value;`.
- A **Padding** keep internal content of a div away from the walls of the div.
- border is a thing.

-**font-family** will change how letters are displayed. 
- There are two kinds of fonts: serifs nad sans-serif.
- Serifs contain the extra segments to assist with moving the eye to the next letter.
- Websites mostly use Sans-serif fonts.
- You should include extra fonts from most specific to general in case a browser does not fail to load.
- **font-weight** controls  how heavy the stroke.
- **font-style** is a thing.
- You can add a class inline using **span**.

- Elements inherit characteristics from their parent element.
- **Align** changes the position in relation to the parent element.

- You can force a link to open a new tab using `target="_blank"`.

- `margin: 0 auto;` is awesome.`
- Make sure to use an external css file using `<link rel= "stylesheet" type= "text/css" href= "styles.css" />`.

## Summary of format:
```html
<style type= "text/css">
	p{ font-size: 1.2em; }
	.class_name { font-size: .2em; }
	#id_name { font-size: .9em; }
```

## Javascript



## Investigate:
- UPGRADE THE COURSE!
- overflow-wrap?
## Further Reading:
