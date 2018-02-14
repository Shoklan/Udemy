# Build a Serverless App with AWS Lambda
## Franke Kane

# Introduction
- What is serverless?
  * Is a Web application where you don't have to manage the server itself.
- User's path:
  * Served HTML, CSS, JS on landing.
  * Javascript communicates and exchanges data using the API.
- Amazong **Simple Storage Server** - or S3 - is where data is stored and can be loaded from.
- The **API Gateway** will connect the user to your content.
- **AWS Lambda** will then use services like DynamoDB or Cognito.
- With this setup, you don't have to think about making sure uptime is not an issue.
- You don't pay for processing time you don't use.
- This also makes it easier to develop the front-end/back-end.
- Good use cases include dynamic applications with lots of user interaction; most of the load is on the client side.
- Bad use cases include where there is a significant amount of communication between Client and Server.
- Steps for Version 1:
  1. Create a new globally unique bucket for your website.
  2. Upload static content to bucket.
  3. Select *Properties* for the bucket.
  4. Enable read access via *Static Website Hosting*.
  5. WORKING!

# Static Chat Application with S3
- S3 is a Key-Blob store.
- It's *eventually consistent* meaning that it will take time to fully sync.
- Extremely durable.
- Remember that S3 is **not** a file system.
- **AWS policies** define access controls for:
  * Users.
  * AWS services.
  * Resources.
- You can set a global policy using a Javascript based JSON file.
- To enable this:
  1. Visit the console.
  2. Select the *S3 Service*.
  3. Select the S3 bucket of interest.
  4. Select *Permissions*.
  5. Select *Bucket Policy*.
  6. Copy and paste JS below and adjust name.

```js
{
  "Version": "2012-10-17",
  "Id": "Policy1497053408897",
  "Statement": [
    {
      "Sid": "Stmt1497053406813",
      "Effect": "Allow",
      "Principal": "*",
      "Action": "s3:GetObject",
      //"Resource": "arn:aws:s3:::<your bucket name>/*"
    }
  ]
}
```
- The *config.js* file is where userpoints and APIs are going to be defined.
- The files uploaded can be accessed using the url and path to file within the buckets.

## Javascript Review
- It's similar to C in syntax and look.
- Differences include that it does not require typing and functions are objects.
- `==` means that the two operators are equivalent.
- `===` means that the two operators are of the same type.
- The values *null* and *undefined* are not the same thing in Javascript.
- The access requests `object.value` and `object['value']` are the same.
- We'll be using **JQuery** since it ubiquitous and useful.
- **Document Object Model** or the *DOM*.
- Javascript is single threaded but Node.js or your browser can use AJAX to do psuedo-multi-threading.
- You can return values from those threads using what are called **Callbacks**.
- You append items to the selected element using `.append(<content>)`.


# Creating an API
-


# Use DynamoDB for Storage

# Break up the Monolith

# Add Identity to the App

# Optimization and Preparing For Production

# Conclucsion

# Research:
- Promise?


# Reference:
- [Portal for AWS](https://portal.aws.amazon.com/billing/signup)
- [AWS Free Tier Info](https://aws.amazon.com/free/)
- [Brackets.io](www.brackets.io)
