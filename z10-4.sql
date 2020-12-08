CREATE TABLE IF NOT EXISTS sal
(
    snum  INT         NOT NULL,
    sname VARCHAR(50) NOT NULL,
    city  VARCHAR(50) NOT NULL,
    comm  FLOAT       NOT NULL,
    PRIMARY KEY (snum)
);

CREATE TABLE IF NOT EXISTS cust
(
    cnum   INT         NOT NULL,
    cname  VARCHAR(50) NOT NULL,
    city   VARCHAR(50) NOT NULL,
    rating SMALLINT    NOT NULL,
    snum   INT,
    PRIMARY KEY (cnum),
    FOREIGN KEY (snum) REFERENCES sal (snum) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS ord
(
    onum  INT   NOT NULL,
    amt   FLOAT NOT NULL,
    odate DATE  NOT NULL,
    cnum  INT,
    snum  INT,
    PRIMARY KEY (onum),
    FOREIGN KEY (cnum) REFERENCES cust (cnum) ON DELETE CASCADE,
    FOREIGN KEY (snum) REFERENCES sal (snum) ON DELETE CASCADE
);

