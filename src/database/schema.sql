CREATE table `cases`(
    case_id INTEGER PRIMARY KEY AUTOINCREMENT,
    case_no VARCHAR NOT NULL,
    date_of_delivery DATETIME,
    court VARCHAR,
    case_parties TEXT,
    case_doc VARCHAR,
    created_at DATETIME,
    updated_at DATETIME
)

--@block
 DELETE FROM cases
WHERE case_id = 7;
  

DROP TABLE `cases`;