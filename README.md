# PHP Form for MongoDB Data Capture and Validation (Completed as Profiency Test for Code Infinity)

This is a simple PHP application that allows users to input and validate data, which is then stored in a MongoDB database. The application enforces various validation rules to ensure data integrity and prevent duplicate records.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)

## Requirements

Before using this application, ensure you have the following prerequisites:

- **MongoDB**: You must have MongoDB installed and running on your server or local environment.

- **PHP**: This application is written in PHP, so you need to have PHP installed. I've used version 8.1.17.

## Installation

1. Clone this repository to your local machine using the following command:
   ```bash
   git clone https://github.com/AbdulDavids/CodeInfinity.git
   ```

2. Change into the project directory:
   ```bash
   cd CodeInfinity
   ```

3. Install the MongoDB PHP driver using Composer:
   ```bash
   composer install
   ```

## Usage

1. Start your MongoDB server if it's not already running.

2. Configure the MongoDB connection settings in the PHP script (`index.php`). Update the following lines with your MongoDB connection details:

   ```php
   $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
   $database = $mongoClient->your_database_name; // Replace with your database name
   $collection = $database->your_collection_name; // Replace with your collection name
   ```

3. Run the PHP script by accessing it through your web server. For example, if you're using a local development server, you can access the script at `http://localhost/codeinfinity/index.php`.

4. Fill out the form with the required information: Name, Surname, ID Number, and Date of Birth (in the format dd/mm/YYYY).

5. Click the "POST" button to submit the form.

6. The application will validate the data and store it in the MongoDB database if it passes all validation checks. If there are validation errors or duplicate ID Numbers, appropriate error messages will be displayed to the user.


## Configuration

You can customize the application by modifying the PHP script (`index.php`) to suit your specific needs.

