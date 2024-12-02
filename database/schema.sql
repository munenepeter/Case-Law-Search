-- Create database
CREATE DATABASE IF NOT EXISTS case_law_search;
USE case_law_search;

-- Cases table
CREATE TABLE cases (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    case_number VARCHAR(100),
    citation VARCHAR(255),
    title VARCHAR(500),
    court_id INT,
    judge_names TEXT,
    hearing_date DATE,
    judgment_date DATE,
    parties TEXT,
    summary TEXT,
    content_hash VARCHAR(64),  -- To check if content has changed
    pdf_url VARCHAR(500),
    source_url VARCHAR(500),
    last_scraped TIMESTAMP,
    is_valid BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_citation (citation),
    INDEX idx_hearing_date (hearing_date)
);

-- Courts reference table
CREATE TABLE courts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    court_level VARCHAR(50),  -- Supreme, Appeal, High, Magistrate, etc.
    is_active BOOLEAN DEFAULT TRUE
);

-- Bills table
CREATE TABLE bills (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(500),
    bill_number VARCHAR(100),
    year INT,
    status VARCHAR(50),  -- Draft, First Reading, Second Reading, etc.
    sponsor VARCHAR(255),
    introduction_date DATE,
    last_updated DATE,
    summary TEXT,
    content_json JSON,  -- Store additional details as JSON
    pdf_url VARCHAR(500),
    source_url VARCHAR(500),
    last_scraped TIMESTAMP,
    is_valid BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_year_number (year, bill_number)
);

-- Gazettes table
CREATE TABLE gazettes (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    gazette_number VARCHAR(100),
    publication_date DATE,
    type VARCHAR(100),  -- Special Issue, Regular Issue, etc.
    title VARCHAR(500),
    summary TEXT,
    content_json JSON,  -- Store notices and other details as JSON
    pdf_url VARCHAR(500),
    source_url VARCHAR(500),
    last_scraped TIMESTAMP,
    is_valid BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_publication_date (publication_date)
);

-- Parliament sessions/hearings
CREATE TABLE IF NOT EXISTS parliament_sessions (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    session_type VARCHAR(100),  -- Committee Meeting, Plenary, etc.
    title VARCHAR(500),
    date DATE,
    time TIME,
    location VARCHAR(255),
    status VARCHAR(50),  -- Scheduled, Completed, Cancelled
    summary TEXT,
    content_json JSON,  -- Store additional details as JSON
    source_url VARCHAR(500),
    last_scraped TIMESTAMP,
    is_valid BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_date (date)
);

-- Scraping logs
CREATE TABLE IF NOT EXISTS scraping_logs (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    scraper_type VARCHAR(50),  -- Cases, Bills, Gazettes, Parliament
    start_time TIMESTAMP,
    end_time TIMESTAMP,
    status VARCHAR(50),  -- Success, Failed, Partial
    items_processed INT,
    items_updated INT,
    items_failed INT,
    error_message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);