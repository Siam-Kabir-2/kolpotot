CREATE DATABASE IF NOT EXISTS kolpopot
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE kolpopot;

CREATE TABLE IF NOT EXISTS membership_applications (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(180) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  department VARCHAR(100) NOT NULL,
  art_medium VARCHAR(50) NOT NULL,
  experience_level VARCHAR(20) NOT NULL,
  portfolio_url VARCHAR(255) NULL,
  motivation TEXT NOT NULL,
  submitted_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status ENUM('pending', 'reviewed', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (id),
  INDEX idx_membership_email (email),
  INDEX idx_membership_status (status),
  INDEX idx_membership_submitted_at (submitted_at)
);