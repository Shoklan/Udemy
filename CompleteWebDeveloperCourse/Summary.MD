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
</style>
```

## Javascript
- javascript is for actively changing content on the page.
- `alert("text")` does those annoying pop ups.
- To insert any kind of javascript code into a website, then you use `<script></script>` blocks.
- document refers to the totality of the page.
- Javascript uses camel-case.
- `document.getElementById("text").innterHTML()` will select element **text's** content.
- Javascript uses `//` or "tilted poles" to mark comments.
- " uses `/* */` or "facing streetlights".
- `onclick=` is a thing.

- `style.display=""` is a thing.
- You define array using `var arrayName= new Array[];
- Assignment is normal as per arrays in other languages like Python.
- If you send output to console, it  will display information in a web browser's javascript console.
- Do that using `console.log( value )`.
- You can assign values by simply adding them to the array via `['value1', 'value2', 'value3']`.

- **Push*8 to add a value; **splice(1, 1)** to remove a value from index. // ( index, times_to_remove )
- To inset an item into an index, use `splice(1, 0, "hail")` // (index, times_to_remove, insert_items )
- You can add more than one item in.
- Return the length using `array.length`.

- Javascript contains all the normal control structures; same as normal languages.
- Functions are defined using `function func_name(varriable1, variabl2){ }`.

## JQuery
- Visit the site [here](www.jquery.com).
- Checkout [Tooltipster](http://iamceege.github.io/tooltipster/)
- Checkout [Magnific Popup](http://dimsemenov.com/plugins/magnific-popup/)
- Checkout [typeahead.js](http://twitter.github.io/typeahead.js/)

- Select elements using `$("element-selector")`
- Ex. is:
```
$("#circle").click( function(){
	// functional code to use
	alert("Circle Clicked");
});
```

- These 'selectors' are called **CSS Selectors**.
- Change text in an element using `.html("text you want changed to.")
- If you submit to `.html()` with no contents, then you'll get the element's text instead.
- You can use `.hover()` for a reaction when an element is hovered over.
- You can retrieve an attribute for an element using `.attr("attribute_target")`.
- If you wanted to change it, then you'd submit a second argument with the replacement value.
- If we want to query a CSS element for one of its attributes, then we use `.css("attribute")`.
- If we want to reference the element clicked, then we can use **this** since javascript appears to support OOP.
- JQuery has a function to make something be hiddem using `.hide()`.
- JQuery has a function to make something fade out using `.fadeOut()`.
- You can pass a second parameter, a function called a **callback**, to `fadeOut()` or `fadeIn()`.
- JQuery will run this after the fade is done.
- Use `.animate()` to pass a set of requests for JQuery to run .
- The format looks like:
```
.animate({
	width: 1000px,
	height: 10px,
	background-color: blue
}, 3000) // this is duration over which to animate.
```
- Javascipt terms remove the `-`'s and uses camelCase.
- AJAX stands for Asyncronous Javascript and XML
- AJAX does not work via the file protocol; `file:///`

- `$.get("location_of_document");` will get the data from a file.
- The second argument passed should be a callback function to use the data.
- But, you shouldn't use **.get**, I guess.
- You should be using **$.ajax**.
```
$.ajax({
	url:"test.html"
}).done( function(data){
	alert(data)
});
```

- Regex is amazing.
- I know what regex is.
- Create a regex using `var regex=/great/;
- To check if regex in input, use `.match(regex);`
- If there are no matches, then it will return null.
- Regex is case sensitive, lest you add the **i** flag.
- Setting **g** flag means to collect all matches; global.

- JQuery UI has its own separate js file.
- `.draggable()` is a thing.
- `.resizable()` is a thing.
```
$("#target").droppable({
	drop: function(ui, event){
		$("#target").css("background-color", "red");
	}
})
```

- `.accordion();` to have the function to auto format headers into an accordians.
- `.sortable();` allows users to drag a set of list items.

## Bootstrap
- The primary framework for *responsive webdesign*.
- *Responsive Webdesign* is about keeping a uniform appearance across all visual devices.
- Dark grey is better than black since it's contrast is too high.
- Boostrap uses something called the "Grid System".
- Bootstrap has 3 "breakpoints" - or expected device sizes.
- Those occur at 768px, 992px, and 1200px.
- The max number of colunms is 12.
- The format to apply responsive design requires a nested **container->row**
- The format for a block is `col-{xs, md, lg}-{1..12}`.
- Bootstrap has already built a bunch of starter templates.
- Giving a div the class **collapse** will allow the div to be shrunk tothe mobile icon.
- If you don't give a **ul** element the class **navbar-nav** then issues arise with **collapse**.
- **data-toggle** is used to implement an action via HTML5.
- Giving an element the class **active** will highlight it to help with navigational information..

- You should surround field inputs with a div that has the class **form-group**.
- This will add proper spacing to it.
- You should surround checkboxes with a div that has the class **checkbox**.
- Bootstrap has a Date-picker; thank you so much~
- `<input type= "date" class="form-control" />`
- Adding a class of **table** to a table element will clean up the formatting.

- Modals are really cool.
- Use the class **modal** to create one.
- The div nesting is modal->modal-dialog->modal-content->{modal-header, modal-body}

- Scrollspy is what moves the highlights at he navigation bar level.
- To do this, include `data-spy="scroll" data-target=".scrolling_class_target"`

## Wordpress
- Wordpress is a **Content Management System** - or CMS.
- Most websites allow you to install Wordpress via a script.
- Posts are for durational updates.
- Pages are static reference pages.
- Themes are what control how content are displayed.
- You can use sample content at [wpcandy](www.wpcandy.com).
- How does wordpress have built in search?; find this!
- Wordpress has lots of themes you can use for free.
- Premium themes can be found at [themeforest](wwww.themeforest.net).

- You can install a wordpress ecommerce plugin using woocommerce.
- This is the best one right now
- Read the introduction guide [here](http://easywpguide.com/)

## PHP
- Php tags are of the form <?php ?>
- Use `echo` to display text.
- PHP uses the file `php.ini` to control its behavior
	1. `display_errors = on`          // obv.
	2. `display_startup_errors = on`  // obv.

- Variables are declared using the format `$name="I'm a variable";`
- Variables cannot start with a number.
- Variable variabel is when you chain variables using multiple `$`.
- This is rooted in linux for sure when you check out the format.
- It basically uses substitution.
- Escape characters using `\`.
- Concatenation is done using the `.` operator.
- Comments of the form /* */

### Arrays
- There are multiple ways to declare an array:
	1. $myArray = array("pizza", "chocolate", "coffee");
	2. Declare element by element.
	3. Using PHP dictionary form: `array( "France" => "French", "USA" => "English", "Germany" => "German");`

- Print the contents of an array using print_r( <array_name> ) //print recursive.
- Arrrays use 0-indexing like C.
- PHP is determined to finish running - even when you've entered erroneous output.
- You delete elements using the `unset( array["value"])`.

### Loops
- Uses C style for loops
- Also supports foreach : `foreach( $array as $key => $value){ ... }`

- Send mail using `mail( $recipient, $subject, $body, $headers);`.
- Variables passed via GET is an array called `$_GET`.
- Variables passed via POST is `$_POST`; do this via `method="post"`.

- PHP has built in filter function to validate input:`filter_var( <input>, FILTER_VALIDATE_EMAIL)`
- If you're not sure whether the protocol is http/https then omit it and use //only
- To center an image via CSS use: `background-position: center;`
- `file_get_contents(<url>)` to pull website data.
- The regex function in PHP is `preg_match(<pattern>, <string>, <save_to>)`

## MySQL
- Make sure to use mysqli_connect() as it's an updated function
- `mysqli_connect( <address>, <username>, <password>, <database_name>)`
- You can stop all commands by calling `die("Error message")`.
- Build a query using a string; `$query = "SELECT * FROM table"`.
- Send the query using `mysqli_query($conn, $query)`; returns boolean, not data.
- Request the results of the query using `mysql_fetch_array( $result_object );`.
- SQL has a 'LIKE' keyword.
- `%` is the wildcard for SQL.
- You can figure out how mnay results using `mysqli_num_rows( $result )
- If you need to escape the different quotation marks in a string to submit, then use `mysqli_real_escape_string( $name )`
- A **Session Variable** is a variable that only exists while the user is logged in.
- To begin, use `session_start()`; must be right at the top of everything.
- To create one, then use `$_SESSION['variable'] = 1;`.

- To set a cookie, then use `setcookie('id', 'value', time());`.
- To see the variables in the cookie, use `$_COOKIE['id'];`.
- DO NOT STORE PASSWORDS IN PLAINTEXT
- Making an MD5 hash using `md5( <value> )`.
- Hashed only can still be broken using a rainbow table.
- Create a salt and prepend that to the password to significantly increase security.
- Do not store the salt in the database.
- Finally, use a salt that is variable per user: `md5( md5(email).$password )`

- You can include other php files using `include(<file>)`
- To forward to a different page, use `header("Location:mainpage.php")`.
- Delete a session using `session_destry()`.
- Protect against MYSQL Injection attacks using `mysqli_real_escape_string()`.



# Mobile Apps





## Investigate:
- UPGRADE THE COURSE!
- overflow-wrap?
- JQuery UI
- X Theme

## Further Reading:
