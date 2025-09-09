# Rental Website Project

## Overview
This project is a **Rental Website system** that combines database design, Java integration, and a simple web interface. The goal is to manage rentals, customers, providers, and contracts efficiently.

## Project Structure
1. **Database (SQL)**
   - Designed a relational database with multiple entities (WebUser, Customer, Rental Provider, Contract, Rental, Insurance, etc.).
   - Implemented salary calculation for Rental Providers based on their contracts.
   - Created views to display aggregated data.

2. **Data Generation & Java Integration**
   - Used [Mockaroo](https://www.mockaroo.com/) to generate random CSV datasets.
   - Integrated generated data into the database using Java classes and streams.

3. **Web Application**
   - Simple website to **view, add, delete** data from key tables (WebUser and Customer).
   - Search functionality: when searching a Customer, the list of concluded contracts is displayed.
   - Styling adapted from [this CodePen template](https://codepen.io/CharlesKenney/pen/weJQPY?editors=1111).

4. **Deployment**
   - Used **FileZilla** to run the PHP-based frontend in `public_html`.

## Technologies Used
- **SQL (MySQL)** – database design and queries  
- **Java** – data integration and processing  
- **PHP** – backend for the website  
- **HTML/CSS** – frontend styling  
- **Mockaroo** – dataset generation  

## Features
- Manage customers, rental providers, and contracts.  
- Track rental items with availability, price, and rating.  
- Automatic salary calculation for providers.  
- Simple user-friendly web interface.
