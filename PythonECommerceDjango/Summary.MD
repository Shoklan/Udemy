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




# Templates

# Bootstrap Framework

# Search Component

# Cart Component

# Checkout Process

# Fast Track to JQuery

# Products & Async

# Custom User Model

# Custom Analytics

# Stripe Integration

# Mailchimp Integration

# Go Live

# Acccount & Settings

# Seelling Digital Items

# Graphs and Sales

# Thank You

## Research:

## Reference:
- [Try Django](www.joincfe.com/youtube)
- [Coding For Open Source Github](www.github.com/codingforentrepreneurs)
- [Bootstrap](www.getbootstrap.com)
