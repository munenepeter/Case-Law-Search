# Kenya Case Law Search

Kenya Case Law Search is a web application designed to provide users with easy access to legal cases, bills, gazettes, and parliamentary business in Kenya. The application aims to offer a reliable and user-friendly interface for searching and browsing through Kenya's legal resources.

## Motivation

The primary motivation for creating this site is the frequent inaccessibility of the official [Kenya Parliament website](https://www.parliament.go.ke/). This project seeks to provide a more reliable alternative for accessing legal information. However, it is important to note that [Kenya Law](https://kenyalaw.org/) remains the authoritative source for legal information, and users should rely on it for official purposes.

## Features

- **Case Law Database**: Search and browse through a comprehensive collection of legal cases from various courts in Kenya.
- **Bills & Legislation**: Track current and upcoming bills in the Kenyan Parliament.
- **Gazettes**: Access official government notifications and legal notices.
- **Parliamentary Business**: Stay updated with parliamentary proceedings, debates, and committee meetings.
- **Court Calendar**: View upcoming court sessions and hearings.
- **Recent Judgments**: Explore the latest court decisions and rulings.

## Experimental Nature

This project is experimental, and features will continue to be added and refined. The development is ongoing as i seek a reliable source of data to ensure the accuracy and comprehensiveness of the information provided.

## Installation

**Install Required Software**

- **PHP**: Ensure you have PHP installed. Laragon comes with PHP pre-installed.
- **Composer**: If using Laragon, Composer is included.
- **MySQL**: If using Laragon, Composer is included.
- **SQLite**: Just have to enable it in php.ini file `extension=pdo_sqlite` and `extension=sqlite3`

> [!NOTE]
> Windows users, it's recommended to use **Laragon** as it simplifies the installation process. You can download it from [here](https://laragon.org/download/). 
> _Laragon comes pre-installed with php v8.1 (as of the date of this writing) but for this project we want 8.3 visit [here](https://windows.php.net/downloads/releases/archives/php-8.3.9-nts-Win32-vs16-x64.zip) to download 8.3 (x64 bit systems) and the unzip it to `C:\path\to\laragon\install\location\bin\php` then change php version in php GUI interface (right click) that's it_


> _for linux users, since you already know how to figure things out, please install a mysql version 8+, (or sqlite) php version 8.3+ and composer latest version_


**Set Up Project Locally**

1. Clone the repository:
   ```sh
   git clone https://github.com/munenepeter/Case-Law-Search.git
   ```

2. Navigate to the project directory:
   ```sh
   cd Case-Law-Search
   ```

3. Install dependencies:
   ```sh
   composer install
   ```

4. Set up your environment variables by copying `.env.example` to `.env` and configuring your database and other settings.

5. Run the application:
   ```sh
   php -S localhost:8000 -t server.php
   ```

6. Open your browser and visit `http://localhost:8000` to access the application.

## Contributing

Contributions are welcome! If you have suggestions for improvements or new features, feel free to open an issue or submit a pull request.

## Disclaimer

> [!WARNING]  
> This site is not an official source of legal information. Users should refer to [Kenya Law](https://kenyalaw.org/) for authoritative legal resources.

Also am utilizing the Tabel Framework which is a custom framework i built trying to learn the internals of the laravel framework, so a lot of things are not yet optimized, but if need be the project can be upgraded to use laravel as the framework closely resembles the laravel framework.