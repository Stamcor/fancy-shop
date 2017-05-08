% Applied Web Application Security Project: Fancy Shop
% Octav-Iulian Teodorescu; Thomas Murschall; Felix Maurer
% \today

# Project
To view this project work you need to follow these steps:

1. At first you will need a database. It has to run on the same machine as the web server so it can be accessed via `localhost`. The name of the database has to be `shop`. A user with name `shop` and password `FancyShop` has to exist and have sufficient permissions on the database.
2. Import the `shop.sql` file into the database to get all tables and data necessary for the application.
3. The base directory to point the web server to, is the `webapp/` directory.

Now you can start the project by pointing your browser to the `intro.html` file. There you will find a short introduction to the project, what you should look after, what methods may be used and some hints in case they are needed.

# Vulnerabilities
In the following you will find a list with the vulnerabilities in the application and their causes.

## SQL-injection in the search
The search in the top bar can be used for an SQL-injection. When you search for the term "car" the following SQL-statement is being generated and executed:

```
SELECT * FROM products WHERE hidden = 0 AND name LIKE '%car%'
```

The search string is not correctly sanitised but inserted using simple string concatenation. Therefore you can use a search term like `' UNION SELECT null, username, password, null, null, null FROM members; -- x` to get a query that looks like this: 

```
SELECT * FROM products WHERE hidden = 0 AND name LIKE '%' UNION SELECT null, username, password, null, null, null FROM members; -- x%'
```

## Cross site scripting on the review dashboard
When logged in, we have the possibility to write a review about a product. This post will be published visible for every user. There is no sanitisation of the input, so we are allowed to insert HTML code and javascript code directly.

If we insert `<script>fancy javascript </script>` and send this review, we see that the text disappeared because it is interpreted as page source code.

When we insert `<script>alert("you got hacked")</script>` we will cause the alert box to appear, every time a user visits the review section.

If the user is logged in at the same time and we want to perform bad tasks like sending a good (or bad) review for a specific product,
we can do it with the session cookie of someone else.

These vulnerability gives also the chance to steal session cookies and perform different bad tasks.
