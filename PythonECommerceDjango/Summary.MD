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
```python3
from django.http import HttpResponse
from django.shortcuts import render

def home_page( request ):
  return HttpResponse("Hello World")

```

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
