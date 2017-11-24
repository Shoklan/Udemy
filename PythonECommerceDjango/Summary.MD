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
- You can start the development server using `django-admin startserver`
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
- 


# Products Component

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
