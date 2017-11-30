# Python eCommerce | Build a Django eCommerce Web Application
## Justin Mitchel

# Getting Started
- Components for class:
  * Python 3.6
  * Django 1.11
  * HTML
  * CSS
  * Bootstrap
  * jQuery
  * Javascript
  * Angular
  * Ionic
- It's a good idea to watch the Try Django videos.
- Email address: **team@joincfe.com**.

# Hello World
- To create a new **virtualenv** you:
  1. Make a directory with a fitting name.
  2. `virtualenv -p python3 .`
  3. `source bin/activate`
- `pip freeze` will show you what the dependencies are.
- The key reason for using *virtualenv* is to control software dependencies.
- To install Django `pip install Django ==1.11.4`
- We're going to make a directory call *src* to hold the source files.
- To start a new project use `django-admin startproject ecommerce .`.
- You can start the development server using `python manage.py startserver`
- Inside of *src/ecommerce* create a file called **views.py**.
```python
# views.py
from django.http import HttpResponse
from django.shortcuts import render

def home_page( request ):
  return HttpResponse("Hello World")
```
- And, then import in *urls.py*:
```python
# urls.py
from .views import home_page

#...

urlpatterns = [
  url(r'^$', home_page)
  # ...
]
```
- You can also insert html into the response and it will work.
- Triple quotes allow you to have multiline strings.
- **Bootstrap** has a class called `text-cente` to center text.
- *render* is what allows us to use html instead of just text.
- You can add templates using:
```python
# settings.py
'DIRS': [os.path.join(BASE_DIR, 'templates')],
```
- Inside *src/templates* we're going to make *home_page.html*.
- We're going to insert the html from the bootstrap page
- Now we can pass the *home_page.html* page using:
```python
# views.py
def home_page( request ):
  return render( request, 'home_page.html', {})
```
- Now you can just write as many templates as you you need; ensuring that you import them in *urls.py*.
- One way to change the data on the page is to pass **Template Context** via the python dictionary in the call.
- You can insert variables in a template using `{{ <var_name> }}`.
- If you don't pass a variable that's on that page, then it wont show up.
- The default submit to the backend is *GET*.
- To change that, you'll want to include `method = 'POST'` inside the `<form>` tag.
- You will be given an error if you don't include `{% csrf_tokeen %}` after the openning `form` tag.
- This is to prevent **Cross Site Request Forgeries**.
- Since a submit is a type of navigation, you can catch form inputs in the same view.
```
if request.method = "POST":
  print( request.POST.get( <form_name> ))
```
- This wont display any errors without **Django Forms**.
- So, you'll want to create file *forms.py*:
```python
from django import forms

class ContactForm(forms.Form):
  fullname = forms.CharField()
  email    = forms.EmailField()
  content  = forms.CharField()
```
- Don't forget to import the forms into your views:
```python
# views.py
from .forms import ContactForm
# ...
contact_form = ContactForm()
# ...

context = {
  # ...
  "form": contact_form
}
```
- This wont allow you to pass class without some hassle:
```python
forms.CharField( widget = forms.TextInput( attrs = {"class": "form-control"}) )
```
- You'll want to pass data to the form using `ContactForm(request.POST or None)`.
- *ContactForm* allows you to define ways to clean the input data.
```python
def clean_email(self):
    email = self.cleaned_data.get('email')
    if not "gmail.com" in email:
        raise forms.ValidationError("Email has to be gmail.com")
    return email
```
- You can access the cleaned data using `contact_form.cleaned_data`.
- You can check if a form is valid using `form.is_valid()`.
- You can check if a user is authenticated using `request.user.is_autenticated()`.
- This will require a database to be setup.
- To do this, use:
  1. `python manage.py migrate`
  2. `python manage.py createsuperuser`
  3. Fill in credentials
- To mark a field as a *password* field, you'd add `widget=form.PasswordInput` to function.
- You're going to want to include:
```python
# views.py
from django.contrib.auth import authenticate, login

user = authenticate( request, username = username, password=password)
if user is not None:
  login(request, user)
  return redirect('/login') # import redirect from django.shortcuts
else:
  context['form'] = LoginForm()
```
- You can insert conditional web content using `{% if premium_content %} ...  {% endif %}`
- You can change the label of a field using `label='Confirm password'`.
- If you wnat fields to compare against one another:
```python
def clean(self):
  data = self.cleaned_data
  password = self.cleaned_data.get('password')
  password2 = = self.cleaned_data.get('password2')
  if password2 != password:
    raise forms.ValidationError("Passwords must match.")
```
- To create users, you'll:
```python
# views.py
from django.contrib.auth.models import User
# ...

user = User.Objects.create_user('<name>', '<email>', 'password')
```
- You'll want to make sure that a user doesn't already exist:
```python
# forms.py
from django.contrib.auth import get_user_model
User = get_user_model()
# ...

qs = User.object.filter( username=username )
if qs.exists():
  raise forms.ValidationError("User already exists.")
```
- You wont really deal with static content since this should be mostly taken care of by something else.
- But, for testing create folder *static_cdn*.
- You're going to add the directory in *settings.py*:
```python
STATICFILES_DIRS =[
  os.path.join(BASE_DIR, 'static_my_proj')
]

STATIC_ROOT = os.path.join(os.path.dirname(BASE_DIR), 'static_cdn')
```
- Make sure to import in urls!
```python
from django.conf import settings
from django.conf.urls.static import static
# ...
 if settings.DEBUG:
   urlpatterns = urlpatterns + static( settings.STATIC_URL, document_root = settings.STATIC_ROOT)
```
- DO NOT USE IN PRODUCTION CODE!
- To add static files use `python manage.py collectstatic`
- You can load static files using `{% load static %}`
- Now you can insert files from the static directoy using `{% static "css/main.css" %}`.

# Products Component
- Django is a web application that is comprised of a bunch of **Apps**.
- To creat an app you use `python manage startapp <appname>`; in this case *products*.
- An *app* handles on thing, and only one thing well.
- **CRUD*** stands for *Create, Retreive, Update, Delete*
- In *products*, create the file *models.py*:
```python
from django.db import models

# create your models here
class Product( models.Model ): # try and name them as a single tense Item
  title = models.CharField(max_length=120)
  description = = models.TextField()
```
- Make sure to add *products* in *INSTALLED_APPS* in *settings.py*
- After ever single model change, run:
  1. `python manage.py makemigrations`
  2. `pythong manage.py migrate`
- If you try and migrate a field without required parameters then you'll be warned about it.
- If a field is required but does not have a default value, then you can tell it `null = True` to insert *null* as the default
- Or, you can use `default = <value>` to actually set the value.
- To register your model with django, you'll open *admin.py* and:
```python
from .models import Product

admin.site.register(Product)
```
- Without `__str__()` there wont be a proper description
```python
def __str__(self):
  return self.title
```
- This interface is useful for small teams but not usable for large usersets.
- Edit *products/views.py*:
```python
from django.views.generic import ListView
from .models import Product

# class based view
class PoductListView( ListView ):
  queryset = Product.objects.all()

# function based view
def product_list_view(request):
  queryset = Product.objects.all()
  context = {
    'object_list': queryset
  }
  return render( request, "product/product_list_view.html", context)
```
- Make sure to import them into *urls.py*
- You can create templates inside of the app folder too.
- Every single class based view has:
```python
def get_context_data(self, *args, **kwargs):
  context = super(ProductListView, self).get_context_data(*args, **kwargs)
  return context
```
- You can interate over values using a for loop:
```python
{% for obj in object_list %}
{{ obj.title }} <br />
{% endfor %}
```
- You can  look up an item using `Product.objects.get(pk=pk)`.
- You can pass a 404 when you import `get_object_or_404 from django.shortcuts`.
- Then, instead of `.get()` you can use `get_object_or_404( Product, pk=pk)`.
- You can refere to a file using `models.FileField(upload_to='products/')`
- You can combine text using `'<new_filename}.{ext}'.format(new_filename=new_filename, ext = ext)`
- Or, `f'<new_filename}.{ext}'` if you're using python 3.6.
- This will still allow any file to be uploaded though.
- To prevent non-image uploads:
  1. Change `FileField()` to `ImageField()`.
  2. Run `pip install pillow` to install the dependency.
  3. Run the migrations as per normal.
- When you attempt to reference the images uploaded, you'll need to use `{{ object.image.url %}}` to get the full url.
- To have accsss to django in a shell, you're going to want to use `python manage.py shell`.
- You can use `.filter()` with *queries* to return less results.
- To use `like` as if in SQL use `title__contains='shirt'`.
- To do the same thing but ignore case, use `title__icontains=` instead.
- If you want to filter on more, then just pass more arguments to the function.
- You could use `.get()` but if it's not found then you'll get an error response.
- You can wrap the call in a `try: expect Product.DoesNotExist:` to catch the error.
- Don't forget you can `from django.http import Http404` to use `Http404()`.
- You can return the top result from a query using `.first()`.
- Django acts like *objects* is a model.
- To override the default model manager, we'll need to write one in *models.py*.
- Add:
```python
class ProductManager(models.Manager):
  def get_by_if(self, id):
    return self.get_queryset(id=id)

# or

qs = self.get_queryset().filter(id=id)
if qs.count() == 1:
  return qs.first()
return None
```
- You can also make sure to return a proper error using:
```python
if instance is None:
  raise Http404("Product doesn't exist.")
```
- To create a checkbox field, use `models.BooleanField(default=False)`.
- Don't forget to check to make sure fields exist before inserting them into a template.
```python
class ProductQuerySet( models.query.QuerySet):
  def featured(self):
    return self.filter(featured = True)
```
- Don't forget to overwrite `ProductManager` with the new function:
```python
def get_queryset( self ):
  return ProductQuerySet( self.model, using=self._db)
```
- A **Slug Field** is a short label for an item or object.
- You insert one using `models.SlugField()`.
- In *admin.py*, you can control the displayed fields using:
```python
class ProductAdmin(admin.modelAdmin):
  list_display = ['__str__', 'slug']
  class Meta:
    model = Product
```
- Now we want to update our urls to handle slug fields
- To do that add to *urls.py*:
```python
url(r'^products/(?P<slug>[\w-]+)/$', ProductDetailView.as_view()),
```
- To use slugs, you'll want to make sure that the field is unique.
- You force this by adding `unique=True` in `models.SlugField()`.
- Signals preemptively alter content when changes are trying to be made.
- You import signals using `from django.db.models.signals import pre_save, post_save`.
```python
def product_pre_save_receiver( sender, instance, *args, **kwargs):
  if not instance.slug:
    instance.slug = 'abc'

pre_save.connect( product_pre_save_receiver, sender = Product)
```
- For apps, you can centralize all the views by adding a *products/urls.py*.
- Then, copy the url maps into that file.
- Then, just import from the file using:
  1. `from django.conf.urls import static, include`
  2. `url(r'^products/', include("products.urls"))`.
  3. Delete the unnecessary leading parts in *products/urls.py*.
- Now you can return based on the slug using:
```python
def get_absolute_url(self):
  return "/products/{slug}".format(slug=self.slug)
```

# Templates
- The point of templates is to reduce the amount of redundant code to present pages.
- You'll usually but them in *templates/base*.
- It is proper nomenclature to use *base.html* for the main file that all templates derive from.
- You can also insert different sections into different files based on what they are:
  * css
  * javascript
  * pieces of the product
- To include a template, use `{% extends "base.html" %}`
- To control where the part is added, use `{% block <content> %}...{% endblock %}`.
- You insert that in both the initial template as well as the extended template.
- Anything that is outside of the block will not be rendered.
- You can also simply insert code anywhere using `{% include 'base/css.html'}`; or whatever file you want.
- You can also pass context dictionaries within `include`.
```python
{% include 'base/navbar.html' with brand_name="eCommerce" %}
```
- That is then a usable variable in the next page.
- For loops look like: `{% for obj in object_lists %} ... {% endfor %}`.
- Now we're going to discuss reverse urls.
- You can pass `name = 'detail'` in a *urls.py* urlpattern to be used as a shortcut to get to that page.
- Then, you can insert that into a template: `{% url 'detail' slug=instance.slug %}`
- These allow you to change the paths and it will still be reference-able.
- To include reverse, use:
```python
# models.py
from django.urls import reverse
# ...
return reverse("detail", kwargs={'slug': self.slug})
```
- But, that will break if we need to have multiple views.
- So, we'll need to pass `namespace='products'` with the *urls.py* urlpattern.
- Then, you'll need to add `products:details` in *models.py* to scope it properly.
- You can conditionally insert based on the current page using:
```python
# navbar.html; please not url-reversing must be configured
{% url 'home' as home_url}
# ...

{% if request.path == home_url %} active {% endif %}
#...
```
- You can use a **filter** to truncate text.
- This is done with `{{ instance.description|truncatewords:<n> }}`.
- You can chain filters together as well.
- You can use `linebreaks` to insert line breaks after paragraphs.
- You can also insert a title using the filter `title`.
- You can insert a timestamp to a model using `models.DateTimeField( auto_now_add=True)`.
- Now you can use the filter `timesince` to calculate the different between now and the time listed.
- You can cycle through inputs using `{% cycle "" "" ""}` where each section will be used until no more elements remain.
- Every for loop has a `forloop.counter` variable.
- You can use the filter `divisibleby:<n>` to check for modularity.
- You can also use the *if-elif-else* inside templates; just don't forget the `endif`.
- Pagination is supported in **Django** but we're not covering it right now.

# Bootstrap Framework
- Bootstrap is for cross-browser support and focuses on making the UI uniform across all devices.
- This works using nexted content inside a `container` or `container-fluid` class.
- **Container Fluid** has full width no matter the browser size while **Container** adjusts itself based on pre-configured sizes.
- It's advised to use *container* when it'll be used on both PC and mobile while *container-fluid* is for PC mostly.
- Bootstrap conceptually breaks the content up into 12 columns spread horizontally across the webpage.
- This follows from the design: Declare container, declare row, declare column.
- `col-1` is the minimum size.
- If you only list `col` then it uses all possible remaining space.
- So, if you use `col-8` and `col` then it will be the same as `col-4`.
- Class `no-gutters` will remove the space between the columns.
- To snap cloumn sets use class `ml-auto`; *margin-left automatic*.
- You can do the same but for the right using `mr-auto`.
- If you include both then you'll get centered content.
- You can make forms clean using class `form-control`.
- Don't forget that you can put a placeholder in.
- You can change the locations using `order-<n>`.
- Bootstrap is a *mobile first* library.
- You can tell it when to trigger break points using `col-<bp>-<n>`, where
  * `bp` means break point from `sm, md, lg, xl`
  * `n` means size from `1, 2, .., 12`.
- You can set different sizes and include all of them.
- You can also add size-dependent margins with `m<l|r>-<bp>-auto`.
- **Check out the margin, padding sections in Bootstrap Docs**.
- Use the clas `navbar` to get the expected navbar configuration and behavior.
- To get the shrinking options to symbolic-lines:
  1. Add `<button class="navbar-toggler" type='button' data-toggle='collapse' data-target='#navbar-collapseLinks' aria-expanded='false' aria-label='Toggle Navigation'>..</button>`
  2. Inside the button: `<span class='navbar-toggler-icon'></span>`.
  3. Surround the items with `<div class="collapse navbar-collapse" id="navbar-collapseLinks">`
  4. Use class `navbar-nav` in `<ul>`.
  5. Don't forget to add `<li class='nav-item'>..</li>`.
  6. Finally, add `navbar-expand-md` to the *navbar* div class.

# Search Component
- Since you're going to want to be able to search more than just a single project, you'll want a new app.
- Make sure to set up the namespaces correctly.
- You can also use `__iextact` to check for  the exact value.
- Now we're going to be learning about how to implement **GET** urls.
- You can check those using `reqeust.GET`.
```python
query = reqeust.GET.get('q')
if query is not None:
  return Product.objects.filter(title__icontains=query)
return Products.objects.none()
```
- You can also set the default in `get()` as a second argument.
- You should pass `action={% url "search:query" %}` in the form to tell it where to go.
- *Django* has it's own package to manage queries:
```python
# in Search/views.py
from django.db.models import Q
# ...

lookups = Q(title__icontains=query) | Q(description__icontains=querry) # pipe in python?
return Products.objects.filter(lookups).distinct()
```
- But, in actuality you'll want to move this into the model itself.
- We'll be using something called **Tags** having its own app, that will assist users in find what they're after during search.
- So, we generate a new model.
- Import the product models: `from products.models import Product`.
- We're going to create a foreign key to the prouduct:
```python
# Tags/models.py
products = models.ManyToManyField(Product, blank=True)
```
- The **ManyManager** on the *Products* uses the field *object.tag_set*.
- So, you can get all tags associated with an object using `object.tag_set.all()`.
- No we can search tags in our search field.
- I prefer to call them keywords

# Cart Component
- **Sessions** are a store of the time that a user is on the site.
- By default, sessions are stored in the database.
- Django attaches the session to the request by default.
- You can access is using `request.session`.
- `dir()` will display all methods for a python module.
- Since *session* is just a dictionary, you can save values to it.
- You cannot save request objects to the session, but you can save variables.
- You can reference a **Foreign Key** using `models.ForeignKey(User, null=True, blank=True)`.
- `isinstance()` will compare a variable against a type; `isinstance(12, int)` is True.
```python
# models.py
pre_save_cart_receiver(sender, instance, *args, **kwargs):
  products = instance.products.all()
  total = 0
  for x in products:
    total += x.price
  print( total )
  car_obj.total = total

pre_save.connect(pre_save_cart_receiver, sender = Cart)
```
- This doesn't necessary change it though so we'll need to use the **Many-To-Many** signal.
- This is imported from `django.db.models.signals import m2m_changed`
- You just need to add action to the list of passed arguments.
- To have it update it, you need to pass the field that will be changing: `Cart.products.through`
- The actions will be denoted by what changes are being made to the items.
```python
if action == 'post_add' or action == 'post_remove' or action == 'post_clear':
  # normal CODE
  instance.save()
```
- `redirect()` accepts namespaces.
- You can add or remove objects using
- Reverse lookups can be used in forms - and just process the form data in that view.
- You can rename variables using:
```python
# models.py
@property
def name(self):
  return self.title
```
- **Font Awesome** allows developers to use icons in developmnt for free.
- You can add one using `<i class="fa <icon_to_reference" aria-hidden"true"></i>`.

# Checkout Process
- **Checkout Process**
  1. Cart -> Checkout View
    * Login/Register or Enter an Email ( as Guest)
    * Shipping Address
    * Billing Info
      * Billing Address
      * Credit Card / Payment
  2. Billing App
    * Billing Profile
      * For user or email ( Maybe Guest Email )
      * Generate Payment Processor Token (Stripe of Braintree)
3. Orders / Invoices App
  * Connecting the Billing Profile
  * Shipping / Billing Address
  * Cart
  * Status -- Shipped?
- You can limit a field using `choices = <tuple_of_choices>` in model creation.
- You can't add type *decimal/int* with type *flaot*.
- You can use `fsum([])` to sum decimal and float numbers; *float sum*
- You can force a number to a *float* using `float()`.
- Redirects are based on what the app directory is.

# Fast Track to JQuery
- Make sure to the CDN's for JQuery.
- You can launch a webserver in python3 using `python3 -m http.server`.
- You can launch a webserver in python using `python SimpleHTTPServer`.
- You can test if JQuery is installed using:
```js
$(document).ready(function(){
  alert("Hello")
})
```
- The item in the parenthesis is called the **Selector**.
- **Document** refers to the full webpage.
- You can change an attribute using `$('body').css("background-color", "red")`.
- You can delay a change in a webpage using `setTimeout(func(){}, <n>)`.
- You can change the text in a tag using `$('h1').text('Hello Again!')`.
- You can target a specific child tag using `$('h1:nth-child(2)')`.
- You can also use id's as well: `$('#header-3')`.
- You can select classes using `$('.header')`.
- You can also chain `.css()` calls.
- JQuery nomenclauture prefers that variables are prepended with **$**.
- You can print to the console using `console.log()`.
- The iterator in *JQuery* is `$.each( function(index, obj){})`.
- JQuery will need you to reference `$(this)` since it's dealing with an object at a time.
- To reference the attribute height use `item[0].scrollHeight`; each object contains tons of referencable variables.
- You can assign and catch events using:
```js
var header3 = $('#header-3')
header3.click(function(event){
  var $this = $(this)

})
```
- You can change the current tab using `window.location.href = <url_here>`.
- *Selectors* are just like the selectors used in other languages; they accept `".description a"`.
- You can prevent what the event using to do using `event.preventDefault()`.
```js
content.submit(function(event){
  event.preventDefualt()
  console.log(contentForm.serialize())           // for sending to backend
  console.log(textAreaContent.attr('name'))
  console.log(textAreaContent.val())

  var textAreaContent = $(this).find('textarea') // find tag 'textarea'.
  var formMethod = $this.attr('method')
  var formAction = $this.attr('action')


  var data = {
    'content': textAreaContent.val(),
    'method': formMethod,
    'action': formAction
  }

  $('.formDataSubmitted').text("Stuff")
})
```

# Products & Async
- **Synchronous** is when the page requires a response from the web server and must wait.
- **Asynchronous** is whne the page doesn't require the web server to respond and refresh.
- *Ajax* stands for **Asynchcronous Javascript And XML**.
- It's a great idea to add a unique class or id to a form.
- The *slim* version of *JQuery* doesn't have *ajax*.
```js
$(document).ready(function(){
  var productForm = $('.form-product-ajax')

  productForm.submit(function(e){
    event.preventDefault();
    console.log("Form is not sending")
    var thisForm = $(this)

    var actionEndpoint = thisForm.attr('action');
    var httpMethod = thisForm.attr('method');
    var formData = thisForm.serialize();

    $.ajax({
      url: actionEndpoint,
      method: httpMethod,
      data: formData,
      success: function(data){},
      error: function(errorData){}
    })
  })
})
```
- Since the endpoint is returning html, then we get html response back.
- To solve this, use `if request.is_ajax()`
- We're going to return the data as **Javascript Object Notation** or *JSON*.
- *Django* already has a way to do this with `from django.http import JsonResponse`.
- And, the example code is:
```python
json_data = {
  'added': added,
  'removed': not added,
}
```
- You can post data using `.html()`.
- You could also use an API endpoint instead.
- We're going to use an anonymous function now: `products = [{'name':x.name, 'price':x.price} for x in cart.obj.projects.all()]`.
- You can prepend data to html using `.prepend()`.
- Now we're going to add autosearch.
```js
var searchForm = $('.search-Form')
var searchInput = searchForm.find('[name='q']')

// prepare to modify input
var typingTimer;
var typingInterval = 1500;

searchInput.keyup(function(e){
  clearTimeout(typingTimer) // clear the timer
  typingTimer = setTimeout(performSearch, typingInterval)
})

searchInput.keydown(function(e){
  clearTimeout(typingTimer) // clear the timer
})

function performSearch(){
  var query = searchInput.val()
  window.location.href = '/search/?q=' + query
}
```
- A similar function called `.keydown()` exists for when a key is pressed down.
- To add a class to a selection use `.addClass()`.
- *Auto-Saving* would be very similar to this.
- You need to tell users when an error occured.
- You can send an status code using `JsonResponse( <data>, status = 404)`
- We want a consistent experience across all browsers so we're going to use **JQuery-Confirm**.
- After installing it, you just use `$.alert("Message")` and it's much cleaner.
- You can adjust the *title*,*content*,*theme* by passing an array with those keys.
- To empty a form use `thisForm[0].reset()`.
- You can convert the fields in a form into JSON using `as_json()`.
- AJAX is not safe without the *csrf_token*
- Make sure to actually read the *CSRF Token* primer at the bottom.

# Custom User Model
- You can't use `models.Model` for authentication since it's a special kind of model.
```python
# in accounts/models.py
from django.contrib.auth.models import (
  AbstractBaseUser
)

# when migrated, empty default fields are [ id, password, last_login]

class User(AbstractBaseUser):
  # pass
  email = models.EmailField(unique = True, max_length = 255, )
  full_name = models.CharField(max_length = 255, blank = True, null=True)
  active = models.BooleanField( default = True)
  staff = models.BooleanField( default = False)
  admin = models.BooleanField( default = False)


  USERNAME_FIELD = 'email'
  REQUIRED_FIELDS = []

  def __str__(self):
    return self.email

  def get_full_name(self):
    return self.email

  def get_short_name(self):
    return self.email

  @property
  def is_staff(self):
    return self.staff

  @property
  def is_active(self):
    return self.active

  @property
  def is_sadmin(self):
    return self.admin
```
- You can extend off the *User* model that you created.
- This is safer since there can be very extreme consequences to changing the *User* model.
- To replace the default account, you'll need to import `BaseUserManager` from the same place as before.
```python

class UserManager(BaseUserManager):
  def create_user(self, email, password = None, is_active = True, is_staff = False, is_admin = False):
    if not email:
      raise ValueError("Users must have an email address.")
    if not password:
      raise ValueError("Users must have a password.")

    user_obj = self.model(
      email = self.normalize_email(email) # does exactly what you'd think.
    )
    user_obj.set_password(password) # as well as change it too.
    user_obj.staff  = is_staff
    user_obj.admin  = is_admin
    user_obj.active = is_active
    user_obj.save( using = self._db)
    return user_obj

  def create_staffuser(self, email, password = None):
    user_obj = self.create_user(
      email,
      password = password,
      is_staff=True,
    )
    return user_obj

  def create_superuser(self, email, password = None):
    user_obj = self.create_user(
      email,
      password = password,
      is_staff=True,
      is_admin = True
    )
    return user_obj

```
- You'll want to add `objects  = UserManager()` to your *AbstractBaseUser* model after.
- To now use this model for logging in, you add `AUTH_USER_MODEL = 'accounts.User'` to *settings.py*.
- **Fixtures** allow us to update our database while keeping important data we don't wish to lose.
- Run `python manage.py dumpdata --format json --ident 4`.
- You can pass `pproducts.Product` between *dumpdata* and *--format* to specify which ones.
- You can output the data using the previous code appended with `> products/fixtures/products.json`.
- Then, after dumping the backups run `python manage.py loaddata products/fixtures/products.json`
- There are default functions *Django* expects:
```python
# don't forget these
def has_perm(self, perm, obj=None):
  return True

def has_module_perms( self, app_label):
  return True
```
- This will clear the error.
- Now modify *admin.py* with:
```python
from django.contrib import admin
from django.contrib.auth import get_user_model
# other stuff

User = get_user_model()
admin.site.register(User)
```
- The forms for this look pretty terrible though.
```python
class UserAdmin(admin.ModelAdmin):
  search_fields = ['email']

  class Meta:
    model = User

admin.site.register(User, UserAdmin)
```
- Review the guide on Custom User Models below.
- Class based views are a lot better.

# Custom Analytics
- We're going to make our own App to manage our analytics.
- You could use *Google Analytics* but then you'd be giving up control of the data.
```python
# models.py
from django.db import models
from django.conf import settings
from django.contrib.contenttypes.fields import GenericForeignKey
from django.contrib.contenttypes.models import ContentType

User = settings.AUTH_USER_MODEL

class ObjectView(models.Model):
  user = models.ForeignKey( User, blank = True, null = True)
  ip_address = = models.CharField(max_length = 220, blank = True, null = True) # There is an IpField but we're not using it.
  content_type = models.ForeignKey(ContentType) # this stands in for ANY of our models: User, Product, Order, Cart, etc..
  object_id = models.PositiveIntegerField()
  content_object = GenericForeignKey('content_type', 'object_id')
  timestamp = models.DateTimeField(auto_add_now = True)

  def __str__(self):
    return "%s views %s" %(self.content_object, self.timestamp)

  class Meta:
    ordering = [-timestamp] # most recent saved show first.
    verbose_name = 'Object viewed'
    verbose_name_plural = 'Objects viewed'
```
- This does the mappings that other *Foreign Keys* usually do but at a more abstract level.
- Make sure to add the app to *settings.py*
- Add it to *admin.py*
```python
# admin.py
from .models import ObjectViewed

admin.site.register( ObjectViewed )
```
- Craete a *utils.py* and then add:
```python
def get_client_ip(request):
  x_forwarded_for = request.META.get('HTTP_X_FORWAREDED_FOR')
  if x_forwarded_for:
    ip = x_forwarded_for.split(',')[0]
  else:
    ip = request.META.get('REMOTE_ADDR')
  return ip
```
- Now we're going to create custom signal in *signals.py*
```python
from django.dispatch import Signal

object_viewed_signal = Signal(providing_args = ['instance', 'request'])
```
- You send a *signal* using `object_viewed_signal.send(instance.__class__, instance = instance, request = request)`.
- When you using class based views, you can create something called a **Mixin**.
- You're going to create a new file called *mixins.py*.
```python
class ObjectViewedMixin(object):
  context = super(ObjectViewedMixin, self).get_context_data(*data, **kwargs))
  request = self.request
  instance = context.get('object')
  if instance:
    object_viewed_signal.send( instance.__class__, instance = instance, request = request)
  return context
```
- Then, you can just pass `ObjectViewedMixin` to any Class views you want to use the signal.
- In the *models.py* file:
```python
def object_viewed_receiver(sender, instance, request, *args, **kwargs):
  c_type = ContentType.objects.get_for_model(sender) # this will tell you the content type.

  new_view_obj = ObjectViewed.objects.create(
    user = request.user,
    content_type = c_type,
    object_id = instance.id,
    ip_address = get_client_ip(request)
  )
object_viewed_signal.connect( object_viewed_receiver ) # you don't have to pass the sender because it's already defined.
```
- Now we're going to create a signal for sessions:
```python
# models.py
from django.contrib.sessions.models import Session
from django.db.models.signals import pre_save, post_save
# ...
```
- Now in *signals.py*
```python
# signal.py
from django.dispatch import Signal

user_logged_in = Signal(providing_args=['instance', 'request'])
```

# Stripe Integration
-



# Mailchimp Integration

# Go Live

# Acccount & Settings

# Seelling Digital Items

# Graphs and Sales

# Thank You

## Research:
- What are signals?
- `is_safe_url()`?
- Javascript *integrity* attribute?
- Javascript *crossorigin* attribute?
- JQuery-Confirm?

## Reference:
- [Try Django](www.joincfe.com/youtube)
- [Coding For Open Source Github](www.github.com/codingforentrepreneurs)
- [Bootstrap](www.getbootstrap.com)
- [Django Regular Expressions](www.kirr.co/plugin)
- [Large File Uploads in Django](www.kirr.co/e1133t)
- [FontAwesome.io](www.fontawesome.io)
- [Primer on CSRF Token with Django](www.kirr.co/58ewx3)
- [Custom User Models](www.kirr.co/ygijli)
- [Custom Analytics](www.kirr.co/mh9shf)
