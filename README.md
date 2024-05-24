# affiliate_link_manager
Affiliate Link Management Tool
Overview
The Affiliate Link Management Tool is a simple web application designed to help you manage, shorten, and track your affiliate links. This tool also generates QR codes for easy sharing and scanning.

Features
Shorten URLs: Convert long affiliate URLs into short, manageable links.
Track Clicks: Monitor the number of clicks on each shortened URL.
Generate QR Codes: Create QR codes for each shortened URL for easy sharing.

Requirements
PHP: Version 7.0 or Higher
SQLite: For lightweight database management
Web Server: Apache (recommended with XAMPP for local development)

Installation

Step 1: Download and Install XAMPP
Download XAMPP from Apache Friends.
Install XAMPP and start the Apache server from the XAMPP Control Panel.

Step 2: Set Up the Project
Clone the Repository: Clone this repository to your local machine or download the ZIP file and extract it.
Move Files: Move the affiliate_link_manager folder to the htdocs directory in your XAMPP installation folder (e.g., C:\xampp\htdocs).

Step 3: Set Up the Database
Run Database Setup: Open your web browser and navigate to http://localhost/affiliate_link_manager/db_setup.php. This will create the necessary SQLite database and tables.
Check Database: Verify that the database. sqlite file has been created in the db directory.

Usage
Adding a New Link
Open the Application: In your browser, go to http://localhost/affiliate_link_manager/index.php.
Add a Link: Enter your original URL into the form and click "Add Link".
View Shortened URL: The shortened URL will be displayed, along with a QR code for easy sharing.

Redirecting and Tracking Clicks
Use the Shortened URL: Share the shortened URL. When someone visits it, they will be redirected to the original URL, and the click will be recorded.
Track Clicks: The main page (index.php) displays a table of all links, showing the original URL, the shortened URL, the number of clicks, and the QR code.
