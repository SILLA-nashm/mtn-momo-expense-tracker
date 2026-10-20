# MTN MoMo Expense Tracker - Financial Intelligence Layer

A smart expense manager built to complement MTN MoMo's existing mini-statements and email statements.

## Problem
MTN MoMo mini-statement shows only last 5 transactions. Email statement sends PDF with 100+ raw transactions, costs 2500 UGX and takes 24 hours. No categories, no charts, no budgeting help.

## Solution
My system categorizes every expense, shows pie charts, monthly trends, budget alerts and search. It answers "Where did my money go?" not just "What did I spend?"

## Features
- Add expenses with categories: Food, Rent, Transport, School, Business
- Dashboard with Chart.js - Pie chart and monthly bar chart
- Search and filter by date and category
- Admin panel to manage users
- Secure login with password hashing

## Security
- No MoMo PIN stored
- Password hashing using password_hash()
- Prepared statements to prevent SQL injection
- Auto logout after 10 minutes

## Tech Used
PHP, MySQL, JavaScript, Chart.js, HTML, CSS
Designed to integrate with MTN MoMo Open API as microservice

## Author
Built by Silla Charles Malaba, Uganda
For MTN Uganda Financial Inclusion